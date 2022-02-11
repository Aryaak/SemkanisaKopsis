<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category,Request $request)
    {
        try{
        $category->create($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Kategori berhasil dibuat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $category = Category::find($id);
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        try{
        $category = Category::find($id);
        $category->update($request->all());
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Kategori berhasil diubah');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('categories');
    }

    public function delete($id)
    {
        try{
        $category = Category::find($id);
        $category->delete();
        }catch(Exception $e){
            Session::flash('message', $e);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('products');
        }
        Session::flash('message', 'Kategori berhasil dihapus');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('categories');
    }
}
