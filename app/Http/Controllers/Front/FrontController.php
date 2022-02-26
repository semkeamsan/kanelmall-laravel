<?php

namespace App\Http\Controllers\Front;

use App\Helpers\CartHelper;
use App\Models\ChatManager;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function index()
    {
        return view('front.index');
    }
    public function home()
    {
        $sliders = session('sliders', collect());
        $products = session('products', collect());
        $promotions = session('promotions', collect());
        foreach ($promotions as $promotion) {
            $promotion->products = collect();
            $products->map(function ($product) use ($promotion) {
                if ($promotion->category_id == $product->category_id) {
                    $promotion->products->add($product);
                }
            });
        }
        $categories = session('categories', collect());
        return view('front.home', compact('sliders', 'products', 'promotions', 'categories'));
    }
    public function search()
    {
        $products = collect();
        if (request('q')) {
            foreach (session('products', collect()) as $key => $product) {
                if (str_contains(Str::lower($product->name), Str::lower(request('q')))) {
                    $products->add($product);
                }
            }
        } else {
            $products = session('products', collect());
        }
        return view('front.search', compact('products'));
    }
    public function category()
    {
        $categories = collect();
        if (request('q')) {
            foreach (session('categories', collect()) as $key => $category) {
                if (str_contains(Str::lower($category->name), Str::lower(request('q')))) {
                    $categories->add($category);
                }
            }
        } else {
            $categories = session('categories', collect());
        }

        return view('front.category', compact('categories'));
    }
    public function categoryby($slug)
    {
        $category = null;
        foreach (session('categories', collect()) as $cate) {
            if ($cate->id == $slug) {
                $category = $cate;
                break;
            }
        }
        if ($category) {
            $products = collect();
            if (request('q')) {
                foreach ($category->products as $key => $product) {
                    if (str_contains(Str::lower($product->name), Str::lower(request('q')))) {
                        $products->add($product);
                    }
                }
            } else {
                $products = collect($category->products);
            }

            return view('front.categoryby', compact('category', 'products'));
        }
        abort(404);
    }
    public function cartadd($slug)
    {
        $add = CartHelper::add($slug, request('qty',1));
        if (request()->ajax()) {
            return $add;
        }
        return  redirect()->back();
    }
    public function cartremove($slug)
    {
        $delete = CartHelper::delete($slug);
        if (request()->ajax()) {
            return $delete;
        }
        return  redirect()->back();
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function chat()
    {
        $chatmanagers = ChatManager::get();
        return view('front.chat', compact('chatmanagers'));
    }
    public function product($slug)
    {
         $product  = product($slug);
         $product->category = category($product->category_id);
         return view('front.product', compact('product'));
        abort(404);
    }
}
