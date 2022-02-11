<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return view('payment.index',['payment'=>$payment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $payment,Request $request)
    {
        try{
        $payment->create($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('categories');
        return redirect()->route('payments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment,$id)
    {
        $payment = Payment::find($id);
        return view('payment.edit',['payment'=>$payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment,$id)
    {
        try{
        $payment = Payment::find($id);
        $payment->update($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('payments');
    }

    public function delete($id)
    {
        try{
        $payment = Payment::find($id);
        $payment->delete();
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('payments');
    }
}
