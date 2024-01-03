<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $total_earning = Order::sum('total');
        $total_order_count = Order::count();
        $total_categories = Category::count();
        $total_products = Product::count();
        $total_customers = User::where('role_id', 2)->count();
        $orders = Order::with(['billing', 'orderdetails'])->latest('id')->paginate(15);

        $order_on_2020 = Order::whereBetween('created_at', ['2020-01-01', '2020-12-31'])->count();
        $order_on_2021 = Order::whereBetween('created_at', ['2021-01-01', '2021-12-31'])->count();
        $order_on_2022 = Order::whereBetween('created_at', ['2022-01-01', '2022-12-31'])->count();

        $order_yearwise = array($order_on_2020, $order_on_2021, $order_on_2022);
        return view("backend.page.dashboard", compact(
            'total_earning',
            'total_order_count',
            'total_categories',
            'total_products',
            'total_customers',
            'orders',
            'order_yearwise',
        ));
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
