<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Province;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Controllers\Front\ApiController;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Order extends Component
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
        'payment_image' => 'required|image|max:2048',
    ];
    public $attributes;
    public $checkout = false;
    public $checkoutid = null;
    public $status = 'all';
    public $orders;
    public $phone;
    public $qty = [];
    public $coupon = [];
    public $coupon_message = [];
    public $comments = [];
    public $shippings = [];
    public $provinces;
    public $province;
    public $districts;
    public $district;
    public $communes;
    public $commune;
    public $villages;
    public $village;
    public $address;
    public $latitude;
    public $longitude;
    public $payment_via;
    public $payment_image;
    public $response;
    public function mount()
    {
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
    }

    public function render()
    {
        if (request('status')) {
            $this->status = request('status');
        }
        if ($this->status == 'all') {
            $this->orders = request()->user()->orders;
        } elseif ($this->status == 'pending') {
            $this->orders = request()->user()->orders->whereIn('status', ['pending', 'paid']);
        } elseif ($this->status == 'confirmed') {
            $this->orders = request()->user()->orders->whereIn('status', ['delivered','confirmed']);
        } else {
            $this->orders = request()->user()->orders->where('status', $this->status);
        }
        $this->orders = $this->orders->filter(function ($order) {
            $order->total_price  = $order->products->sum('total_price');
            $order->final_total_price  =  $order->total_price;
            $order->total_price_coupon = 0;
            if ($this->payment_image == null) {
                $this->payment_image  = $order->payment_image;
            }


            if (!@$this->shippings[$order->id]) {
                $this->shippings[$order->id] = $order->shipping_fee_id;
                if (!$this->shippings[$order->id]) {
                    $this->shippings[$order->id] = session('shippings',collect())->first()->id??0;
                }
            }

            if ($this->shippings[$order->id]) {
                $order->shippingData = shipping($this->shippings[$order->id]);
                if($order->shippingData){
                    if ($order->shippingData->packing_charge_type == 'percentage') {
                        $order->final_total_price =  $order->total_price +  ($order->total_price * $order->shippingData->packing_charge) / 100;
                    } elseif ($order->shippingData->packing_charge_type == 'fixed') {
                        $order->final_total_price =    $order->total_price +  $order->shippingData->packing_charge;
                    }
                }

            }


            if (!@$this->coupon[$order->id]) {
                $this->coupon[$order->id] = $order->coupon;
            }
            if (!@$this->coupon_message[$order->id]) {
                $this->coupon_message[$order->id] = null;
            }
            $this->coupon_message[$order->id] = null;
            if ($this->coupon[$order->id]) {
                $order->coupon = $this->coupon[$order->id];
                $coupon =  (new ApiController)->coupon($this->coupon[$order->id]);
                if ($coupon) {
                    $order->couponData = $coupon;
                    if (now()->diff($coupon['end_at'])->invert === 0) {

                    } else {
                        $this->coupon_message[$order->id] = __('Coupon code expired');
                    }
                } else {
                    $this->coupon_message[$order->id] = __('Coupon code incorrect');
                }
            }


            if ($order->coupon && $order->couponData) {
                // Not expired
                if (now()->diff($coupon['end_at'])->invert === 0) {
                    if ($order->couponData['discount_type'] == 'percentage') {
                        $order->total_price_coupon = $order->total_price - ($order->total_price * $order->couponData['discount_amount']) / 100;
                    } elseif ($order->couponData['discount_type'] == 'fixed') {
                        $order->total_price_coupon = $order->total_price - $order->couponData['discount_amount'];
                    }

                    if ($this->shippings[$order->id]) {
                        if ($order->shippingData->packing_charge_type == 'percentage') {
                            $order->final_total_price =  $order->total_price_coupon +  ($order->total_price_coupon * $order->shippingData->packing_charge) / 100;
                        } elseif ($order->shippingData->packing_charge_type == 'fixed') {
                            $order->final_total_price =    $order->total_price_coupon +  $order->shippingData->packing_charge;
                        }
                    }
                } elseif ($order->status != 'pending') {
                      // expired excerpt all status not for pending
                    $order->couponData = $coupon;
                    if ($order->couponData['discount_type'] == 'percentage') {
                        $order->total_price_coupon = $order->total_price - ($order->total_price * $order->couponData['discount_amount']) / 100;
                    } elseif ($order->couponData['discount_type'] == 'fixed') {
                        $order->total_price_coupon = $order->total_price - $order->couponData['discount_amount'];
                    }

                    if ($this->shippings[$order->id]) {
                        if ($order->shippingData->packing_charge_type == 'percentage') {
                            $order->final_total_price =  $order->total_price_coupon +  ($order->total_price_coupon * $order->shippingData->packing_charge) / 100;
                        } elseif ($order->shippingData->packing_charge_type == 'fixed') {
                            $order->final_total_price =    $order->total_price_coupon +  $order->shippingData->packing_charge;
                        }
                    }
                }
            }




            if ($order->status == 'pending' && now()->diff($order->created_at->addDays(2))->invert) {
                $order->delete();
            } else {
                if ($order->products->count()) {
                    $order->products = $order->products->map(function ($row) {
                        if (!@$this->qty[$row->id]) {
                            $this->qty[$row->id] = $row->qty;
                        }

                        if (!@$this->comments[$row->id]) {
                            $this->comments[$row->id] = $row->comment;
                        }
                        return $row;
                    });
                    return $order;
                } else {
                    $order->delete();
                }
            }
        });
        return view('livewire.front.order');
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
    public function status($status)
    {
        $this->status = $status;
        (new ApiController)->transactions($this->orders);
        $this->emit('urlChange', LaravelLocalization::getLocalizedURL(app()->getLocale(), route('front.account.myorder', 'status=' . $status)));
    }
    public function togglecheckout($orderid)
    {
        $this->checkoutid = $orderid;
        if ($this->checkout) {
            $this->checkout = false;
        } else {
            $this->checkout = true;
        }
    }

    public function qty($orderid, $id)
    {
        if ($this->qty[$id]) {
            $o =  $this->orders->find($orderid)->products->find($id);
            $o->qty = $this->qty[$id];
            if ($this->qty[$id] < $o->product->instock) {
                $o->total_price = $o->price * $this->qty[$id];
            } else {
                $o->qty = $this->qty[$id] = $o->product->instock;
                $o->total_price = $o->price * $this->qty[$id];
            }
            $o->save();
        }
    }
    public function qtyadd($orderid, $id)
    {
        $this->qty[$id]++;
        $this->qty($orderid, $id);
    }
    public function qtyremove($orderid, $id)
    {
        if ($this->qty[$id]) {
            $this->qty[$id]--;
            $this->qty($orderid, $id);
        }
    }

    public function remove($orderid, $id)
    {
        $this->orders->find($orderid)->products->find($id)->delete();
        $this->response = [
            'status' => $this->orders->find($orderid)->count() == 0 ? 'cancel' : null,
            'type' => 'success',
            'message' => __('Successfully'),
        ];
    }

    public function payment($orderid)
    {

        $name = auth()->id() . '-' . slug(auth()->user()->name) . '-order' . $orderid . '.png';
        $rules =  $this->rules;
        if (gettype($this->payment_image) == 'object') {
            $rules['payment_image'] = 'required|image|max:2048';
        }
        foreach ($this->rules as $key => $value) {
            $this->attributes[$key] = __(str_replace('_', ' ', Str::title($key)));
        }
        $this->attributes['payment_image'] = __('Upload Payment');
        $this->validate($rules, [], $this->attributes);

        if (gettype($this->payment_image) == 'object') {
            $this->payment_image->storeAs('/public/payments', $name);
            $this->payment_image =  asset('storage/payments/' . $name);
        }
        $this->orders->find($orderid)->update([
            'total_price' => $this->orders->find($orderid)->products->sum('total_price'),
            'province_id' => $this->province,
            'district_id' => $this->district,
            'commune_id' => $this->commune,
            'village_id' => $this->village,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'payment_via' => $this->payment_via,
            'payment_image' => $this->payment_image,
            'shipping_fee_id' => @$this->shippings[$orderid],
        ]);

        if (@$this->coupon[$orderid]) {
            if ($coupon =  (new ApiController)->coupon($this->coupon[$orderid])) {
                if (now()->diff($coupon['end_at'])->invert === 0) {
                    $this->orders->find($orderid)->update([
                        'coupon' => $this->coupon[$orderid],
                    ]);
                }
            }
        }
        $checkout =  (new ApiController)->checkout($this->orders->find($orderid));

        if ($checkout && @$checkout['success']) {
            $this->orders->find($orderid)->update([
                'transaction_id' => $checkout['transactionID'],
                'status' => 'paid',
            ]);
            return redirect()->to(LaravelLocalization::getLocalizedURL(app()->getLocale(), route('front.account.myorder', 'status=paid')));
        }

        return redirect()->to(LaravelLocalization::getLocalizedURL(app()->getLocale(), route('front.account.myorder', 'status=pending')));
    }
    public function receive($orderid)
    {
        (new ApiController)->transactions($this->orders);
        if ($this->orders->find($orderid)->status == 'cancel') {
            $this->response = [
                'type' => 'warning',
                'status' => 'cancel',
                'message' => __('Your order has been cancel'),
            ];
        } else {
            $checkout = (new ApiController)->received($this->orders->find($orderid)->transaction_id);
            if ($checkout) {
                $this->orders->find($orderid)->update([
                    'comment' => @$this->comments[$orderid],
                    'status' => 'received',
                ]);
                $this->response = [
                    'type' => 'success',
                    'message' => __('Successfully'),
                ];
                return redirect()->to(LaravelLocalization::getLocalizedURL(app()->getLocale(), route('front.account.myorder', 'status=received')));
            }else{

                $this->orders->find($orderid)->update([
                    'status' => 'cancel',
                ]);
                $this->response = [
                    'type' => 'warning',
                    'status' => 'cancel',
                    'message' => __('Your order has been cancel'),
                ];
            }
        }
    }

    public function orderdelete($orderid)
    {
        $payment_image = $this->orders->find($orderid)->payment_image;
        $payment_image = collect(explode('/',$payment_image))->last();
        if($this->orders->find($orderid)->delete()){
            Storage::delete('public/payments/'.$payment_image);
        }
        $this->response = [
            'type' => 'success',
            'message' => __('Delete successfully'),
        ];

        //return redirect()->route('front.account.myorder', 'status='.$this->status);
    }
    public function hydrate()
    {
        $this->response = null;
    }

    public function transactions()
    {
        (new ApiController)->transactions($this->orders);
    }


}
