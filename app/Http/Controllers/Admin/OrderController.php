<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = UserOrder::latest('id')->get();
        return view('admin.order.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserOrder $order)
    {
        $validate = $request->validate($order->validation->rules(), $order->validation->messages(), $order->validation->attributes());
        $order = $order->create($request->all());
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserOrder $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserOrder $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = UserOrder::find($id);
        return view('admin.order.form', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserOrder $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $order = UserOrder::find($id);
        // $validate = $request->validate($order->validation->rules($order->id), $order->validation->messages(), $order->validation->attributes());
        $order->update($request->all());
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
     * @param  \App\Models\UserOrder $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        UserOrder::whereIn('id', explode(',', $ids))->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
