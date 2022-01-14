<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class OldApiController extends Controller
{
    protected $API_DOMAIN = 'https://pos.eocambo.com';
    protected $API_USER = 153;
    protected $API_BUSID = 50;

    public function init()
    {
        $response =  Http::withoutVerifying()->get(env('API_DOMAIN',$this->API_DOMAIN) . '/api/products/' . env('API_USER',$this->API_USER) . '/' . env('API_BUSID',$this->API_BUSID,$this->API_BUSID))->json();
        $this->sliders();
        $this->promotions();
        $this->products($response['products']);
        $this->categories($response['category']);
        if (!request()->ajax()) {
            return redirect()->route('front.home');
        }
    }
    public function sliders()
    {
        $sliders = collect();
        try {
            $apisliders = Http::withoutVerifying()->get(env('API_DOMAIN',$this->API_DOMAIN) . '/api/slider/search/' . env('API_BUSID',$this->API_BUSID));
            if ($apisliders->json('success')) {
                $apisliders  = $apisliders->json();
                unset($apisliders['success']);
                foreach ($apisliders as $key => $slider) {
                    $sliders->add(array_to_jsdecode($slider));
                }
            }
            session()->put('sliders', $sliders);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $sliders;
    }
    public function promotions()
    {
        $promotions = collect();
        try {
            $apipromotions = Http::withoutVerifying()->get(env('API_DOMAIN',$this->API_DOMAIN) . '/api/discount/search/' . env('API_BUSID',$this->API_BUSID));

            if ($apipromotions->json('success')) {
                $apipromotions  = $apipromotions->json();
                unset($apipromotions['success']);
                foreach ($apipromotions as $key => $promotion) {
                    if (!$promotion['image']) {
                        $promotion['image_url'] = asset('images/bg/log.jpg');
                    }
                    $promotions->add(array_to_jsdecode($promotion));
                }
            }
            session()->put('promotions', $promotions);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $promotions;
    }

    public function products(array $data)
    {
        $products = collect();
        foreach ($data as $key => $value) {

            if ($value['image']) {
                $value['image_url'] =  (env('API_DOMAIN',$this->API_DOMAIN) . '/uploads/img/' . $value['image']);
            } else {
                $value['image_url'] =  asset('images/bg/log.jpg');
            }

            $value['selling_price'] =  $value['price'];
            $value['promotion']     =  false;

            $value = session('promotions')->map(function ($promotion) use ($value) {

                if ($promotion->category_id == $value['category_id']) {
                    if (now()->diff($promotion->ends_at)->invert === 0) {
                        $value['promotion'] = $promotion;

                        if ($promotion->discount_type == 'percentage') {
                            $value['selling_price'] =  $value['price'] -  ($value['price'] * $promotion->discount_amount) / 100;
                        }
                    }
                }
                return $value;
            })->first() ?? $value;

            $products->add(array_to_jsdecode($value));
        }
        session()->put('products', $products);
        return $products;
    }

    public  function categories(array $data)
    {
        $categories = collect();
        foreach ($data as $value) {
            $value['promotion'] = null;
            foreach (session('promotions') as $promotion) {
                if ($promotion->category_id == $value['id']) {
                    $value['promotion']  = $promotion;
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
            $value['promotion']     =  false;

            $value = session('promotions')->map(function ($promotion) use ($value) {
                if ($promotion->category_id == $value['id']) {
                    if (now()->diff($promotion->ends_at)->invert === 0) {
                        $value['promotion'] = $promotion;
                    }
                }
                return $value;
            })->first() ?? $value;
            $categories->add(array_to_jsdecode($value));
        }



        session()->put('categories', $categories);
        return $categories;
    }
}
