<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Province;
use App\Helpers\CartHelper;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Controllers\Front\ApiController;

class Cart extends Component
{
    use WithFileUploads;
    public $rules = [
        'province' => 'required',
        'district' => 'required',
        'commune' => 'required',
        'address' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'payment_via' => 'required',
        //'payment_image' => 'required|image|max:2048',
        'payment_image' => 'required|image',
    ];
    public $attributes = [];
    public $products = [];
    public $total = 0;
    public $total_coupon = 0;
    public $coupon = null;
    public $coupon_message = null;
    public $provinces;
    public $province;
    public $districts;
    public $district;
    public $communes;
    public $commune;
    public $villages;
    public $village;
    public $checkout = false;
    public $latitude;
    public $longitude;
    public $phone;
    public $address;
    public $payment_image;
    public $payment_via;
    public function mount()
    {
        if (request()->user()) {
            $this->province = auth()->user()->province_id;
            $this->district = auth()->user()->district_id;
            $this->commune = auth()->user()->commune_id;
            $this->village = auth()->user()->village_id;
            $this->address = auth()->user()->address;
            $this->phone = auth()->user()->phone;
            $this->latitude = auth()->user()->latitude;
            $this->longitude = auth()->user()->longitude;
            $this->provinces = Province::get();
            $this->payment_via = 'aba';
        }


        if ($this->province) {
            $this->districts = Province::find($this->province)->districts;
        }
        if ($this->districts) {
            $a = Province::find($this->province)->districts->find($this->district);
            if ($a) {
                $this->communes = $a->communes;
            } else {
                $this->communes = [];
                $this->villages = [];
            }
        }
        if ($this->communes) {
            $a = Province::find($this->province)->districts->find($this->district)->communes->find($this->commune);
            if ($a) {
                $this->villages = $a->villages;
            } else {
                $this->villages = [];
            }
        }

        foreach (session('products', collect()) as $k => $product) {
            if (in_array($product->id, CartHelper::get())) {
                $product->qty = ($product->enable_stock && $product->instock) ? 1 : 0;
                $this->products[] = json_decode(json_encode($product), true);
            }
        }
        if (count($this->products) == 0) {
            CartHelper::clear();
        }
    }

    public function render()
    {
        $this->total();
        return view('livewire.front.cart');
    }
    public function updatedProvince()
    {
        $this->districts = Province::find($this->province)->districts;
        $this->communes = [];
        $this->villages = [];

        $this->district = null;
        $this->commune = null;
        $this->village = null;
    }
    public function updatedDistrict()
    {
        if ($this->districts) {
            $a = Province::find($this->province)->districts->find($this->district);
            if ($a) {
                $this->communes = $a->communes;
            } else {
                $this->communes = [];
                $this->villages = [];

                $this->commune = null;
                $this->village = null;
            }
        }
    }
    public function updatedCommune()
    {
        if ($this->communes) {
            $a = Province::find($this->province)->districts->find($this->district)->communes->find($this->commune);
            if ($a) {
                $this->villages = $a->villages;
            } else {
                $this->villages = [];
                $this->village = null;
            }
        }
    }
    public function samelocation()
    {
        $this->address = $this->provinces->find($this->province)->translation->name;
        $this->address .= ', ' . $this->districts->find($this->district)->translation->name;
        $this->address .= ', ' . $this->communes->find($this->commune)->translation->name;
    }
    public function total()
    {
        $this->total = 0;
        $this->total_coupon = 0;
        foreach ($this->products as $k => $product) {
            $price = $product['selling_price'];
            if ($product['prices']) {
                foreach ($product['prices'] as $key => $value) {
                    if ($product['qty'] >= $value['qty']) {
                        $price = $value['price'];
                    }
                }
            }

            if ($product['qty'] > $product['instock']) {
                $product['qty'] =  $this->products[$k]['qty'] = $product['instock'];
            }

            if ($product['qty']) {
                $this->total += ($price * $product['qty']);
            }
        }
        $this->coupon_message = null;
        if ($this->coupon) {
            $coupon =  (new ApiController)->coupon($this->coupon);
            if ($coupon) {
                if (now()->diff($coupon['end_at'])->invert === 0) {
                    if ($coupon['discount_type'] == 'percentage') {
                        $this->total_coupon =  $this->total -  ($this->total * $coupon['discount_amount']) / 100;
                    } elseif ($coupon['discount_type'] == 'fixed') {
                        $this->total_coupon =    $this->total -  $coupon['discount_amount'];
                    }
                } else {
                    $this->coupon_message = __('Coupon code expired');
                }
            } else {
                $this->coupon_message = __('Coupon code incorrect');
            }
        }
    }
    public function qtyadd($key)
    {

        $this->products[$key]['qty']++;
        if ($this->products[$key]['qty'] > $this->products[$key]['instock']) {
            $this->products[$key]['qty'] = $this->products[$key]['instock'];
        }
    }
    public function qtyremove($key)
    {
        if ($this->products[$key]['qty']) {
            $this->products[$key]['qty']--;
        }
    }
    public function remove($key)
    {
        CartHelper::delete($this->products[$key]['id']);
        unset($this->products[$key]);
    }

    public function togglecheckout()
    {

        if ($this->checkout) {
            $this->checkout = false;
        } else {
            $this->checkout = true;
        }
    }
    public function payment()
    {
        if (request()->user()) {

            $this->checkout = true;

            $rules =  $this->rules;
            foreach ($this->rules as $key => $value) {
                $this->attributes[$key] = __(str_replace('_', ' ', Str::title($key)));
            }
            $this->attributes['payment_image'] = __('Upload Payment');
            $this->validate($rules, [], $this->attributes);
            $order = request()->user()->orders()->where('status', 'pending')->whereDate('created_at', now())->first() ?? request()->user()->orders()->create([]);
            $name = auth()->id() . '-' . slug(auth()->user()->name) . '-order-' . $order->id .'-'. now()->format('d-M-Y').'.png';
            $this->payment_image->storeAs('/public/payments', $name);

            foreach ($this->products as $product) {
                if ($product['qty']) {
                    $price = $product['selling_price'];
                    if ($product['prices']) {
                        foreach ($product['prices'] as $key => $value) {
                            if ($product['qty'] >= $value['qty']) {
                                $price = $value['price'];
                            }
                        }
                    }
                    $order->products()->firstOrCreate(['product_id' => $product['id']], [
                        'product_id' => $product['id'],
                        'price' =>  $price,
                        'total_price' =>  $price * $product['qty'],
                        'qty' => $product['qty'],
                    ]);
                }
            }


            $order->update([
                'total_price' => $order->products->sum('total_price'),
                'province_id' => $this->province,
                'district_id' => $this->district,
                'commune_id' => $this->commune,
                'village_id' => $this->village,
                'address' => $this->address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'payment_via' => $this->payment_via,
                'payment_image' => asset('storage/payments/' . $name),
            ]);

            if ($this->coupon) {
                $coupon =  (new ApiController)->coupon($this->coupon);
                if ($coupon) {
                    if (now()->diff($coupon['end_at'])->invert === 0) {
                        $order->update([
                            'coupon' => $this->coupon,
                        ]);
                    }
                }
            }

            $checkout = (new ApiController)->checkout($order);
            if ($checkout && @$checkout['success']) {
                $order->update([
                    'transaction_id' => $checkout['transactionID'],
                    'status' => 'paid',
                ]);
                return redirect()->route('front.account.myorder', 'status=paid');
            }else{
                return redirect()->route('front.account.myorder', 'status=pending');
            }
            CartHelper::clear();
        }
        return redirect()->route('login');
    }
}
