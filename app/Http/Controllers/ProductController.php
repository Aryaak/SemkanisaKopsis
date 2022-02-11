<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // $product = DB::table('products')->join('categories','products.category_id','=','categories.id')->select('products.*','categories.name')->get();
        $product=Product::all();
        $categories=Category::all();
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        return view('product.index',compact('product','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        try{
            $input = request()->except('photo');
            $input['photo'] = request()->file('photo')->store('products');
            // $fileName = 'gambar-'.time().'.'.$input['photo']->getClientOriginalExtension();
            // $input['photo']->storeAs('products',$fileName);
            // Storage::disk('local')->put($path, $input['photo']);
            $product->create($input);

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

    public function delete($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('products');
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Produk berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('products')->withSuccess(__('Product deleted successfully.'));
    }

}
