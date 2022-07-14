<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class ApiController
{
    public $API_DOMAIN = 'https://pos.eocambo.com';
    public $API_USER = 153;
    public $API_BUSID = 50;
    public $API_BUSLOCATION = 91;

    public function init()
    {
        $this->transactions();
        $response = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID)->json();
        session()->put('business', $response);
        $this->shippings($response['type_of_services']);
        $this->sliders($response['sliders']);
        $this->promotions($response['promotions']);
        $this->products($response['products']);
        $this->categories($response['categories']);
        if (!request()->ajax()) {
            return redirect()->route('front.home');
        } else {
            return true;
        }
    }
    public function sliders(array $data)
    {
        $sliders = collect();
        foreach ($data as $key => $slider) {
            $sliders->add(array_to_jsdecode($slider));
        }
        session()->put('sliders', $sliders);

        return $sliders;
    }
    public function promotions(array $data)
    {
        $promotions = collect();
        foreach ($data as $promotion) {
            if (!$promotion['image']) {
                $promotion['image_url'] = asset('images/bg/log.jpg');
            }
            $promotions->add(array_to_jsdecode($promotion));
        }
        session()->put('promotions', $promotions);

        return $promotions;
    }
    public function products(array $data)
    {

        $products = collect();
        $populars = collect();
        $new = collect();
        $recommends = collect();
        foreach ($data as $key => $value) {

            if ($value['image']) {
                $value['image_url'] =  (env('API_DOMAIN', $this->API_DOMAIN) . '/uploads/img/' . $value['image']);
            } else {
                $im = count($value['galleries']) ? collect($value['galleries'])->filter(function ($gallery) {
                    if ($gallery['type'] == 'image') {
                        return $gallery;
                    }
                })->first() : null;

                $value['image_url'] = $im ?  $im['path'] :  asset('images/bg/log.jpg');
            }
            $value['selling_price'] = 0;
            $value['price'] = 0;
            if ($value['prices']) {
                $value['price'] =  min(array_column($value['prices'], 'price'));
                foreach ($value['prices'] as $price){
                    if ($price['qty'] <= $value['instock']){
                        $value['price'] =  $price['price'];
                    }
                }


                $value['selling_price'] = $value['price'];
            } elseif ($value['variations']) {
                $value['price'] =  $value['variations'][0]['default_sell_price'];
                $value['selling_price'] =  $value['variations'][0]['default_sell_price'];
            }
            $value['selling_price_fixed'] = currency($value['selling_price'], 'USD', session('currency'));
            $value['promotion']     =  false;

            foreach (session('promotions') as $promotion) {
                if ($promotion->category_id == $value['category_id']) {
                    if (now()->diff($promotion->ends_at)->invert === 0) {
                        $value['promotion'] = $promotion;
                        if ($promotion->discount_type == 'percentage') {
                            $value['selling_price'] =  $value['selling_price'] -  ($value['selling_price'] * $promotion->discount_amount) / 100;
                            foreach ($value['prices'] as  $price) {
                                $price['price'] =  $price['price'] -  ($price['price'] * $promotion->discount_amount) / 100;
                            }
                        } elseif ($promotion->discount_type == 'fixed') {
                            $value['selling_price'] =  $value['selling_price'] - $promotion->discount_amount;
                            foreach ($value['prices'] as  $price) {
                                $price['price'] =  $price['price'] -  $promotion->discount_amount;
                            }
                        }
                    }
                }
            }
            if ($value['hide_from_app'] == 0) {
                $product = array_to_jsdecode($value);
                $products->add($product);
                if($product->is_popular){
                    $populars->add($product);
                }
                if($product->is_new){
                    $new->add($product);
                }
                if($product->is_recommend){
                    $recommends->add($product);
                }
            }
        }
        $products = sort_products($products);
        session()->put('products', $products);
        session()->put('populars', $products);
        session()->put('new', $products);
        session()->put('recommends', $products);
        return $products;
    }
    public  function categories(array $data)
    {
        $categories = collect();
        foreach ($data as $value) {
            $value['promotion'] = null;
            foreach (session('promotions') as $promotion) {
                if ($promotion->category_id == $value['id']) {
                    if (now()->diff($promotion->ends_at)->invert === 0) {
                        $value['promotion'] = $promotion;
                    }

                    break;
                }
            }

            $value['products'] = collect();
            foreach (session('products') as $product) {
                if ($product->category_id == $value['id']) {
                    $value['products']->add($product);
                }
            }

            if (!$value['image_url']) {
                $value['image_url'] = asset('images/bg/log.jpg');
            }
            if($value['deleted_at'] == null){
                $categories->add(array_to_jsdecode($value));
            }

        }
        session()->put('categories', $categories);
        return $categories;
    }
    public function shippings(array $data)
    {

        $shippings = collect();
        foreach ($data as $key => $value) {
            $shippings->add(array_to_jsdecode($value));
        }
        session()->put('shippings', $shippings);
        return $shippings;
    }
    public  function checkout($order)
    {

        $uid = slug(env('APP_NAME')) . '-' . $this->API_BUSID . '-' . auth()->id();
       
           return $uid;
        }
    }
    public function transactions($orders = null)
    {
        $orders = $orders ?? Order::whereNotIn('status', ['pending'])->get();
        if ($orders->count()) {
            $ids = $orders->pluck('transaction_id');
            $transactions = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/transactions/' . $ids->implode(','))->json();
            foreach ($ids as $key => $id) {
                if( $id && !in_array($id,array_column($transactions??[],'id'))){

                    if($order = $orders->where('transaction_id',$id)->first()){
                        $order->update([
                            'status' => 'cancel',
                        ]);
                    }

                }
            }
            if ($transactions) {
                foreach ($transactions as $t) {
                    $order = $orders->where('transaction_id', $t['id'])->first();
                    if ($order && $t['order_status']) {
                        $order->update([
                            'status' => $t['order_status'],
                            'comment' => $t['additional_notes'],
                        ]);
                    }
                }
            }
            return $transactions;
        }
        return null;
    }

    public function received($transactionIds)
    {
        return Http::withoutVerifying()->post($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/transactions/received/' . $transactionIds)->json();
    }

    public function coupon($code)
    {
        $coupon = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/coupon/' . $code)->json();
        if ($coupon && $coupon['is_active']) {
            return $coupon;
        }
        return null;
    }
}
