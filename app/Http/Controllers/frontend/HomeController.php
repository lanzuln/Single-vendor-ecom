<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller {
    public function home() {

        $testimonial = Testimonial::where('is_active', 1)
            ->latest('id')
            ->limit(3)
            ->select(['id', 'client_name', 'client_designation', 'client_message', 'client_image'])
            ->get();

        $category = Category::where('is_active', 1)
            ->latest('id')
            ->limit(3)
            ->select(['id', 'title','category_image'])
            ->get();

        $product = Product::where('is_active', 1)
        ->latest('id')
        ->limit(8)
        ->select(['id', 'name','slug','product_price','product_image','rating'])
        ->get();

        return view('frontend.page.index', compact(
            'testimonial',
            'category',
            'product'
        ));
    }
}
