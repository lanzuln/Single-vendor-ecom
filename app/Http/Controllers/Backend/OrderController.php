<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['billing', 'orderdetails'])->latest('id')->paginate(15);
        return view('backend.page.order.index', compact('orders'));
    }
}
