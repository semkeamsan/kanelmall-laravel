<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyFormRequest;

class CurrencyController extends Controller
{
    public function __construct()
    {
        request()->merge(['code'  => Str::upper(request('code'))]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = DB::table('currencies')->get();
        return view('admin.currency.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currency.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $r = new CurrencyFormRequest;
        $validate = $request->validate($r->rules(), $r->messages(), $r->attributes());
        currency()->create($validate);
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserOrder $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserOrder $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = DB::table('currencies')->find($id);
        return view('admin.currency.form', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserOrder $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $currency = DB::table('currencies')->find($id);
        $r = new CurrencyFormRequest;
        $validate = $request->validate($r->rules($id), $r->messages(), $r->attributes());
        currency()->update($currency->code,$validate);
        if ($request->ajax()) {
            return [
                'status' => true,
                'message' => __('Edit successfully'),
            ];
        }
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserOrder $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        currency()->delete($code);
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
