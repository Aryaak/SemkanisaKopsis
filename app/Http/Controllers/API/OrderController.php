<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    public function store()
    {
        $order = request()->except('products');
        $products = request('products');

        $orderId = Order::insertGetId($order, 'id');

        foreach ($products as $product) {
            $product['order_id'] = $orderId;
            OrderProduct::create($product);
        }

        return ResponseFormatter::success('Store Order Successfull!', []);
    }
}
