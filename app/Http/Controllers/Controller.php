<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Front\ApiController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('products')) {
                (new ApiController)->init();
            }
            return $next($request);
        });
    }
}
