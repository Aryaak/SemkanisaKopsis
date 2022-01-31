<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class OrderProductController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderproduct = orderproduct::all()->where('deleted',0);
        return view('orderproduct.index',['orderproduct'=>$orderproduct]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(orderproduct $orderproduct,Request $request)
    {
        try{
        $orderproduct->create($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'orderproduct berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderproduct  $orderproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(orderproduct $orderproduct,$id)
    {
        $orderproduct = orderproduct::find($id);
        return view('orderproduct.edit',['orderproduct'=>$orderproduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orderproduct  $orderproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orderproduct $orderproduct,$id)
    {
        try{
        $orderproduct = orderproduct::find($id);
        $orderproduct->update($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'orderproduct berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('categories');
    }
}
