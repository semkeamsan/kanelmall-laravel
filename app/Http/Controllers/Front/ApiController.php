<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Exception;
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
            $categories->add(array_to_jsdecode($value));
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
            $final_total = $order->products->sum('total_price');
            $coupon = $this->coupon($order->coupon);
            $shipping = shipping($order->shipping_fee_id);

            if ($coupon) {
                if (now()->diff($coupon['end_at'])->invert === 0) {
                    if ($coupon['discount_type'] == 'percentage') {
                        $final_total =  $final_total -  ($final_total * $coupon['discount_amount']) / 100;
                    } elseif ($coupon['discount_type'] == 'fixed') {
                        $final_total =    $final_total -  $coupon['discount_amount'];
                    }
                }
            }

            if ($shipping) {
                if ($shipping->packing_charge_type == 'percentage') {
                    $final_total =  $final_total +  ($final_total * $shipping->packing_charge) / 100;
                } elseif ($shipping->packing_charge_type == 'fixed') {
                    $final_total =    $final_total +  $shipping->packing_charge;
                }
            }

            $data = [
                'coupon_id'  => $coupon ? $coupon['id'] : null,
                'transaction_id'  =>  $order->transaction_id,
                'business_id' => $this->API_BUSID,
                'location_id' => $this->API_BUSLOCATION,
                'contact_id' => $contact['id'],
                'payment_image_url' => $order->payment_image,
                'status' => 'draft',
                'order_status' => 'paid',
                'payment_status' => 'paid',
                'is_quotation' => '0',
                'transaction_date' => $order->created_at->timestamp,
                'total_before_tax' => $order->total_price,
                'tax_amount' => '0',
                'rp_redeemed' => '0',
                'rp_redeemed_amount' => '0',
                'shipping_charges' => $shipping ? $shipping->packing_charge : 0,
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
                'created_at' => $order->created_at->timestamp,
                'updated_at' => $order->updated_at->timestamp,
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
                'shipping_address'  => $order->address,
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
                'types_of_service_id'  => '48',
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
                        'created_at' => $o->created_at->timestamp,
                        'updated_at' => $o->updated_at->timestamp,

                    ];
                })->toArray(),
            ];
             return $response =  Http::withoutVerifying()->post($this->API_DOMAIN . '/api/checkout/web', $data)->json();
        }
    }
    public function transactions($orders = null)
    {
        $orders = $orders ?? Order::whereNotIn('status', ['pending'])->get();
        if ($orders->count()) {
            $ids = $orders->pluck('transaction_id');
            $transactions = Http::withoutVerifying()->get($this->API_DOMAIN . '/api/business/' . $this->API_BUSID . '/transactions/' . $ids->implode(','))->json();
            foreach ($ids as $key => $id) {
                if(!in_array($id,array_column($transactions,'id'))){
                    $orders->where('transaction_id',$id)->first()->update([
                        'status' => 'cancel',
                    ]);
                }
            }
            if ($transactions) {
                foreach ($transactions as $t) {
                    $order = $orders->where('transaction_id', $t['id'])->first();
                    if ($order && $t['order_status']) {
                        $order->update([
                            'status' => $t['order_status']
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
