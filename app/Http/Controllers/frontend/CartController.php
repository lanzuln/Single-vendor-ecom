<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupne;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yoeunes\Toastr\Facades\Toastr;

class CartController extends Controller {
    public function applyCupon(Request $request) {

        $request->validate([
            'coupne_name' => 'required',
        ]);

        if (!Auth::check()) {
            toastr()->success('Login fast');
            return redirect()->route('customer.login');
        }




        $cartItemCount = Cart::content()->count(); // Assuming you want the count of individual items in the cart

        if ($cartItemCount == 0) {
            toastr()->error('No Item in cart');
            return redirect()->back();
        }


        $check = Coupne::where('coupne_name', $request->coupne_name)->first();

        if (Session::get('coupne')) {
            toastr()->error('Cupon Already Applied');
            return redirect()->back();
        }

        if ($check != null) {
            $expire = $check->expire > Carbon::now()->format('Y-m-d');
            if ($expire) {
                session::put('coupne', [
                    'name' => $check->coupne_name,
                    'discount' => round((Cart::subtotalFloat() * $check->discount_amount) / 100),
                    'cart_total' => Cart::subtotalFloat(),
                    'balance' => round(Cart::subtotalFloat() - (Cart::subtotalFloat() * $check->discount_amount) / 100),
                ]);
                toastr()->success('Cupon Applied');
                return redirect()->back();
            } else {
                toastr()->error('Cupon expired');
                return redirect()->back();
            }

        } else {
            toastr()->error('Invalid Cupon');
            return redirect()->back();
        }

    }

    public function removeCupon() {
        Session::forget('coupne');

        toastr()->success('Cupon removed');
        return redirect()->back();
    }
}
