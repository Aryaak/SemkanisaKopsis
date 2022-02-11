<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all();
        return view('status.index',['status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Status $status,Request $request)
    {
        try{
        $status->create($request->all());
        }catch(Exception $e){
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
    public function edit(Status $status,$id)
    {
        $status = Status::find($id);
        return view('status.edit',['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status,$id)
    {
        try{
        $status = Status::find($id);
        $status->update($request->all());
        }catch(Exception $e){
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
        try{
        $status = Status::find($id);
        $status->delete();
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('statuses');
    }
}
