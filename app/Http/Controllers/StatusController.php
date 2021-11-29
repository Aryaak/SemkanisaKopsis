<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all()->where('deleted',0);
        return view('status.index',['status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Status $status,Request $request)
    {
        $status->create($request->all());
        return redirect()->route('statuses')->withSuccess(__('Product created successfully.'));
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
        $status = Status::find($id);
        $status->update($request->all());
        return redirect()->route('statuses')->withSuccess(__('status updated successfully.'));
    }
}
