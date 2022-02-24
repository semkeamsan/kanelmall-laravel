<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Order::latest('id')
        ->whereHas('user',function($user){
            $user->when(request('s'),function($user){
                $user->where('name','like','%'.request('s').'%');
            });
        })->when(request('s'),function($order){
            $order->orWhere('transaction_id','like','%'.request('s').'%');
        })->paginate(20);
        return view('admin.order.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Order::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.form', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $order = Order::find($id);
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
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        foreach (Order::whereIn('id', explode(',', $ids))->get() as $row) {
            $payment_image = collect(explode('/',$row->payment_image))->last();
            if($row->delete()){
                Storage::delete('public/payments/'.$payment_image);
            }
        }
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
