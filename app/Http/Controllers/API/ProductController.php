<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function getForHome()
    {
        $data = Product::limit(5)->get();

        return ResponseFormatter::success('Get Product for Home Successfull!', $data);
    }

    public function getDetail($id)
    {
        $data = Product::find($id);
        return ResponseFormatter::success('Get Product for Home Successfull!', $data);
    }

    public function getRelated()
    {
        $data = Product::where('category_id', request('category_id'))->limit(5)->get();

        return ResponseFormatter::success('Get Related Product Successfull!', $data);
    }

    public function getByCategory()
    {
        $data = Product::where('category_id', request('category_id'))->get();

        return ResponseFormatter::success('Get Product by Category Successfull!', $data);
    }
}
