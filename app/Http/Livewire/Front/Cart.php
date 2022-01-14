<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Helpers\CartHelper;

class Cart extends Component
{
    public $products = [];
    public $total = 0;

    public function mount()
    {
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

    public function total()
    {
        $this->total = 0;
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


    public function order()
    {
        if (request()->user()) {

            $order = request()->user()->orders()->where('status','pending')->whereDate('created_at', now())->first() ?? request()->user()->orders()->create([]);

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
                    $order->products()->firstOrCreate(['product_id' => $product['id']],[
                        'product_id' => $product['id'],
                        'price' =>  $price,
                        'total_price' =>  $price * $product['qty'],
                        'qty' => $product['qty'],
                    ]);
                }
            }

            CartHelper::clear();
            return redirect()->route('front.account.myorder');
        }
        return redirect()->route('login');
    }
}
