<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return $this->dashboard();
    }
    public function dashboard()
    {
        return view('admin.index');
    }
}
