<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('front.account');
    }
    public function orderadd(Request $request, $id)
    {

        $order = request()->user()->orders()->where('status', 'pending')->whereDate('created_at', now())->first() ?? request()->user()->orders()->create([]);
        $product = product($id);
        $price = $product->selling_price;
        $product->qty = $product->instock ? request('qty', 1) : 0;
        if ($product->prices) {
            foreach ($product->prices as $key => $value) {
                if ($product->qty >= $value->qty) {
                    $price = $value->price;
                }
            }
        }

        $order->products()->firstOrCreate(['product_id' => $product->id], [
            'product_id' => $product->id,
            'price' =>  $price,
            'total_price' =>  $price * $product->qty,
            'qty' => $product->qty,
        ]);


        return redirect()->route('front.account.myorder', 'status=pending');
    }


    public function myorder()
    {
        return view('front.account.order');
    }

    public function settings()
    {
        return view('front.account.settings');
    }
    public function personal()
    {
        return view('front.account.personal');
    }
    public function authentication()
    {

        return view('front.account.authentication');
    }

    public function address(Request $request, User $user)
    {
        if ($request->method() == 'POST') {
            $rules = ['address' => 'required'];
            $attributes = ['address' => __('Address'), 'map' => __('Map')];
            $validate = $request->validate($rules, $user->validation->messages(), $attributes);

            $request->user()->update($request->all());
        }
        return view('front.account.address');
    }
}
