<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Controller {
    public function shoppingCartpage() {
        $carts = Cart::content();
        $total = Cart::subtotal();
        return view('frontend.page.shopping-cart', compact('carts', 'total'));
    }
    public function shoppingCart(Request $request) {

        $product_slug = $request->product_slug;
        $product_qty = $request->quantity;

        $product = Product::whereSlug($product_slug)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $product_qty,
            'price' => $product->product_price,
            'weight' => 0,
            'product_stock' => $product->product_stock,
            'options' => [
                'product_image' => $product->product_image,
            ],
        ]);
        toastr()->success('Add to cart success');
        return redirect()->back();

    }
    public function removeFromCart($rowId) {
        Cart::remove($rowId);

        if(Session::has('coupne')){
            Session::forget('coupne');
        }
        toastr()->warning('Cart removed');
        return redirect()->back();
    }
}
