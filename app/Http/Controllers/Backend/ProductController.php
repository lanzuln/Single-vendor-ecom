<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiImage;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $product = Product::latest('id')->get();
        return view('backend.page.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $category = Category::latest()->get();
        return view('backend.page.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) {
        // dd($request->all());
        if ($request->hasFile('product_image')) {

            $file = request()->file('product_image');
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(400, 415)->save(public_path('/uploads/product/' . $fileName));
            $filePath = "uploads/product/{$fileName}";
            $product= Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
                'alert_quantity' => $request->alert_quantity,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'addtional_info' => $request->addtional_info,
                'product_image' => $filePath,

            ]);

             // multiple image upload
             $product_id = $product->id;

             if ($request->hasFile('multi_images')) {

                 foreach ($request->file('multi_images') as $image) {
                     $file = $image;
                     $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                     Image::make($file)->resize(400, 415)->save(public_path('/uploads/product/multi/' . $fileName));
                     $filePath = "/uploads/product/multi/{$fileName}";

                     // Create a record in the products_multi_image table
                     ProductMultiImage::where('product_id', $product_id)->create([
                         'product_id' => $product_id,
                         'multi_images' => $filePath,
                     ]);
                 }
             }

            toastr()->success('product created with image');
            return redirect()->route('product.index');
        }
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'product_code' => $request->product_code,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'alert_quantity' => $request->alert_quantity,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'addtional_info' => $request->addtional_info,

        ]);
        toastr()->success('product created without image');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug) {
        $category = Category::latest()->get();
        $product = Product::whereSlug($slug)->first();
        return view('backend.page.product.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $slug) {

        $product = Product::whereSlug($slug)->first();
        if ($request->hasFile('product_image')) {
            if ($product && File::exists(public_path($product->product_image))) {
                File::delete(public_path($product->product_image));
            }

            $file = request()->file('product_image');
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(400, 415)->save(public_path('/uploads/product/' . $fileName));
            $filePath = "uploads/product/{$fileName}";

             Product::where('slug', $slug)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'product_stock' => $request->product_stock,
                'alert_quantity' => $request->alert_quantity,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'addtional_info' => $request->addtional_info,
                'product_image' => $filePath,
                'is_active' => $request->filled('is_active'),
            ]);
            // if ($request->hasFile('product_image')) {

            // }

            toastr()->success('product updated with image');
            return redirect()->route('product.index');

        }
        Product::where('slug', $slug)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'product_code' => $request->product_code,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'alert_quantity' => $request->alert_quantity,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'addtional_info' => $request->addtional_info,
            'is_active' => $request->filled('is_active'),
        ]);
        toastr()->success('product updated withput image');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug) {
        try {

            $product = Product::where('slug', $slug)->first();
            $oldImagePath = public_path($product->product_image); // Get the full path to the old image

            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                // Delete the old image
                unlink(public_path($oldImagePath));
            }

            Product::where('slug', $slug)->delete();

            toastr()->success('product deleted');
            return redirect()->route('product.index');

        } catch (Exception $e) {
            return $e;
        }
    }
}
