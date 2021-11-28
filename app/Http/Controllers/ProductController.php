<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $product = DB::table('products')->join('categories','products.category_id','=','categories.id')->select('products.*','categories.name')->where('products.deleted',0)->get();
        $product=Product::all()->where('deleted',0);
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        return view('product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Request $request)
    {
        try{
            $input = $request->except('photo');
            $input['photo'] = request()->file('photo');
            $product = Product::create($input);
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('products');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        try{
        $product = Product::findOrFail($id);
        }catch(Exception $e){
        Session::flash('message', $e);
        Session::flash('alert-class', 'alert-danger');
        return redirect()->route('products');
    }
        return view('product.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        $product = Product::findOrFail($id);
        $product->update($request->all());
        }catch(Exception $e){
        Session::flash('message', $e);
        Session::flash('alert-class', 'alert-danger');
        return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('products')->withSuccess(__('Product updated successfully.'));
    }

}
