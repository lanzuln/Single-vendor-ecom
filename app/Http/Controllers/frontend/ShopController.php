<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shopPage(){
        $category = Category::where('is_active',1)
        ->with('products')
        ->limit(5)
        ->latest('id')
        ->get();

        $product = Product::where('is_active',1)
        ->latest('id')
        ->paginate(5);
        return view('frontend.page.shop',compact('product','category'));

    }

    public function singleProduct($product_slug){

        $product= Product::whereSlug($product_slug)->with('category','product_images')->first();

        $related_product= Product::whereNot('slug',$product_slug)->latest('id')->limit(3)->get();
        return view('frontend.page.single_product',compact('product','related_product'));

    }
}
