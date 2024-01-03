<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerDashboard(){
        $customer= Auth::user();
    return view('frontend.page.auth.dashboard',compact('customer'));
    }
    public function customerLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('customer.login');

    }
}
