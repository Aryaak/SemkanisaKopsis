<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = OrderStatus::all();
        return view('status.index', ['status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrderStatus $status, Request $request)
    {
        try {
            $status->create($request->all());
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('statuses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $status, $id)
    {
        $status = OrderStatus::find($id);
        return view('status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $status, $id)
    {
        try {
            $status = OrderStatus::find($id);
            $status->update($request->all());
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('statuses');
    }

    public function delete($id)
    {
        try {
            $status = OrderStatus::find($id);
            $status->delete();
        } catch (Exception $e) {
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('statuses');
    }
}
