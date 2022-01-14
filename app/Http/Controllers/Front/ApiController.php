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
        $response =  Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID)->json();
        $this->sliders($response['sliders']);
        $this->promotions($response['promotions']);
        $this->products($response['products']);
        $this->categories($response['categories']);
        if (!request()->ajax()) {
            return redirect()->route('front.home');
        } else {
            // return $response;
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
                $value['selling_price'] = $value['price'];
            } elseif ($value['variations']) {
                $value['price'] =  $value['variations'][0]['default_sell_price'];
                $value['selling_price'] =  $value['variations'][0]['default_sell_price'];
            }

            $value['promotion']     =  false;

            $value = session('promotions')->map(function ($promotion) use ($value) {

                if ($promotion->category_id == $value['category_id']) {
                    if (now()->diff($promotion->ends_at)->invert === 0) {
                        $value['promotion'] = $promotion;
                        if ($promotion->discount_type == 'percentage') {
                            $value['selling_price'] =  $value['selling_price'] -  ($value['selling_price'] * $promotion->discount_amount) / 100;
                            foreach ($value['prices'] as  $price) {
                                $price['price'] =  $price['price'] -  ($price['price'] * $promotion->discount_amount) / 100;
                            }
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
            // $value['promotion']     =  false;
            // $value = session('promotions')->map(function ($promotion) use ($value) {
            //     if ($promotion->category_id == $value['id']) {
            //         if (now()->diff($promotion->ends_at)->invert === 0) {
            //             $value['promotion'] = $promotion;
            //         }
            //     }
            //     return $value;
            // })->first() ?? $value;
            $categories->add(array_to_jsdecode($value));
        }
        session()->put('categories', $categories);
        return $categories;
    }
    public  function checkout($order)
    {
        $uid = slug(env('APP_NAME')) . '-' . $this->API_BUSID . '-' . auth()->id();
        $contact = Http::withoutVerifying()->post($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/customer', [
            'created_by'  => $this->API_USER,
            'type' => 'customer',
            'name' => auth()->user()->name,
            'image_url' => auth()->user()->avatar,
            'email'     => auth()->user()->email,
            'mobile'   => auth()->user()->phone,
            'shipping_address' => auth()->user()->address,
            'uid'     => $uid,
            'contact_id' => $uid,
        ])->json();

        if ($contact) {
            $discount_amount = 0;
            //$final_total =  $order->total_price -  ($order->total_price * $discount_amount) / 100;
            $final_total =  $order->total_price;
            $data =
                [
                    'business_id' => $this->API_BUSID,
                    'location_id' => $this->API_BUSLOCATION,
                    'contact_id' => $contact['id'],
                    'payment_image_url' => $order->payment_image,
                    'status' => 'draft',
                    'payment_status' => 'paid',
                    'is_quotation' => '0',
                    'transaction_date' => '2021-12-29 10:58:02',
                    'total_before_tax' => $order->total_price,
                    'tax_amount' => '0',
                    'rp_redeemed' => '0',
                    'rp_redeemed_amount' => '0',
                    'shipping_charges' => '0',
                    'round_off_amount' => $order->total_price,
                    'final_total' => $final_total,
                    'is_direct_sale' => '0',
                    'is_suspend' => '0',
                    'exchange_rate' => '1',
                    'created_by' =>  $this->API_USER,
                    'is_created_from_api' => '0',
                    'essentials_duration' => '0',
                    'essentials_amount_per_unit_duration' => '0',
                    'rp_earned' => '0',
                    'is_recurring' => '0',
                    'created_at' => '2021-12-29 10:58:02',
                    'updated_at' => '2021-12-29 10:58:02',
                    'type' => 'sell',
                    'customer_group_id' => '',
                    'invoice_no' => slug(env('APP_NAME')) . '-' . $order->id,
                    'ref_no' => '',
                    'tax_id' => '',
                    'discount_type' => 'percentage',
                    'discount_amount' => $discount_amount,
                    'additional_notes' => '',
                    'staff_note' => '',
                    'commission_agent'  => '',
                    'shipping_details' => '',
                    'shipping_address'  => '',
                    'shipping_status'  => '',
                    'delivered_to'  => '',
                    'selling_price_group_id' => '0',
                    'pay_term_number' => '',
                    'pay_term_type' => '',
                    'recur_interval'  => '',
                    'recur_interval_type'  => 'days',
                    'subscription_repeat_on'  => '',
                    'subscription_no' => '',
                    'recur_repetitions'  => '0',
                    'order_addresses' => $order->address,
                    'sub_type'  => '',
                    'types_of_service_id'  => '',
                    'packing_charge'  => '0',
                    'packing_charge_type'  => '',
                    'service_custom_field_1'  => '',
                    'service_custom_field_2'  => '',
                    'service_custom_field_3'  => '',
                    'service_custom_field_4' => '',
                    'import_batch' => '',
                    'import_time' => '',
                    'transaction_type' => 'sell',
                    'pay_method' => $order->payment_via,
                    'cash_register_id' => '1',
                    'latitude' => $order->latitude,
                    'longitude' => $order->longitude,
                    'products'   => $order->products->map(function ($o) {
                        return [
                            'product_id' => $o->product_id,
                            'variation_id' => $o->product->variations ? collect($o->product->variations)->first()->id : null,
                            'quantity' => $o->qty,
                            'quantity_returned' => '0',
                            'unit_price_before_discount' => $o->price,
                            'unit_price' => $o->price,
                            'line_discount_type' => 'fixed',
                            'line_discount_amount' => $o->product->promotion ? $o->product->promotion->discount_amount : 0,
                            'unit_price_inc_tax' => $o->price,
                            'item_tax' => '0',
                            'tax_id' => '',
                            'discount_id' => $o->product->promotion ? $o->product->promotion->id : null,
                            'lot_no_line_id' => '',
                            'sell_line_note' => '',
                            'res_service_staff_id' => '',
                            'res_line_order_status' => '',
                            'woocommerce_line_items_id' => '',
                            'parent_sell_line_id' => '',
                            'children_type' => 'combo',
                            'sub_unit_id' => '',
                            'created_at' => $o->created_at,
                            'updated_at' => $o->updated_at,

                        ];
                    }),
                ];


            return $response =  Http::withoutVerifying()->post($this->API_DOMAIN . '/api/checkout', $data)->json();
        }
    }
    public function transactions()
    {
        $orders = Order::where('status', 'paid')->get();
        if ($orders->count()) {
            $ids = $orders->pluck('transaction_id');
            $transactions = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/transactions/' . $ids->implode(','))->json();
            if ($transactions) {
                foreach ($transactions as $t) {
                    $order = $orders->where('transaction_id', $t['id'])->first();
                    if ($t['status'] == 'final') {
                        if ($order) {
                            $order->update([
                                'status' => 'delivered'
                            ]);
                        }
                    } elseif ($t['status'] == 'cancel') {
                        if ($order) {
                            $order->update([
                                'status' => 'cancel'
                            ]);
                        }
                    }
                }
            }
            return $transactions;
        }
        return null;
    }

    public function received($transactionIds)
    {
        return $transactions = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/transactions/received/' . $transactionIds)->json();
    }
}
