<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class TestimonialController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $testimonial = Testimonial::latest()->get();
        return view('backend.page.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('backend.page.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request) {
        if ($request->hasFile('client_image')) {

            $file = request()->file('client_image');
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/testimonial/'), $fileName);
            $filePath = "uploads/testimonial/{$fileName}";

            Testimonial::create([
                'client_name' => $request->client_name,
                'client_name_slug' => Str::slug($request->client_name),
                'client_designation' => $request->client_designation,
                'client_message' => $request->client_message,
                'client_image' => $filePath,
            ]);
            toastr()->success('Testimonial created with images');
            return redirect()->route('testimonial.index');
        }
        Testimonial::create([
            'client_name' => $request->client_name,
            'client_name_slug' => Str::slug($request->client_name),
            'client_designation' => $request->client_designation,
            'client_message' => $request->client_message,
        ]);
        toastr()->success('Testimonial created without images');
        return redirect()->route('testimonial.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial) {
        //
    }
}
