<?php

namespace App\Http\Controllers\Admin;
use App\Models\ChatManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatManagerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection =ChatManager::latest('id')->get();

        return view('admin.chatmanager.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chatmanager.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ChatManager $chatmanager)
    {
        $validate = $request->validate($chatmanager->validation->rules(), $chatmanager->validation->messages(), $chatmanager->validation->attributes());
        $chatmanager = $chatmanager->create($request->all());

        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag $chatmanager
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag $chatmanager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chatmanager =ChatManager::find($id);
        return view('admin.chatmanager.form',compact('chatmanager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag $chatmanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chatmanager =ChatManager::find($id);
        $validate = $request->validate($chatmanager->validation->rules($chatmanager->id), $chatmanager->validation->messages(), $chatmanager->validation->attributes());
        $chatmanager->update($request->all());

        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag $chatmanager
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        ChatManager::whereIn('id', explode(',', $ids))->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
