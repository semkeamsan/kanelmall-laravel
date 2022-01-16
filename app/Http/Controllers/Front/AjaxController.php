<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function home(){
        $products = session('products', collect());
        $products = $products->random($products->count());
        return view('front.home.product',compact('products'));
    }
}
