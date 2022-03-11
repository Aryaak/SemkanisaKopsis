<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::all();
        return view('order.index', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(order $order, Request $request)
    {
        try {
            $order->create($request->all());
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Order berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('orders');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order, $id)
    {
        $order = order::find($id);
        return view('order.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order, $id)
    {
        try {
            $order = order::find($id);
            $order->update($request->all());
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Order berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('orders');
    }

    public function delete($id)
    {
        try {
            $order = order::find($id);
            $order->delete();
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Order berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('orders');
    }
}
