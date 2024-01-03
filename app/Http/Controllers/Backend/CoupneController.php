<?php

namespace App\Http\Controllers\Backend;

use toastr;
use App\Models\Coupne;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoupneRequest;
use App\Http\Requests\UpdateCoupneRequest;

class CoupneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupon = Coupne::latest('id', 'DESC')->get();
        return view('backend.page.cupon.index', compact('cupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.cupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoupneRequest $request)
    {
        Coupne::create([
            'coupne_name'=>$request->coupne_name,
            'discount_amount'=>$request->discount_amount,
            'minimum_purchase'=>$request->minimum_purchase,
            'expire'=>$request->expire,
        ]);

        toastr()->success('coupon created');
        return redirect()->route('coupne.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupne $coupne)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupne = Coupne::whereId($id)->first();
        return view('backend.page.cupon.edit',compact('coupne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoupneRequest $request, $id)
    {
        Coupne::whereId($id)->update([
            'coupne_name'=>$request->coupne_name,
            'discount_amount'=>$request->discount_amount,
            'minimum_purchase'=>$request->minimum_purchase,
            'expire'=>$request->expire,
            'is_active' => $request->filled('is_active'),
        ]);

        toastr()->success('coupon updated');
        return redirect()->route('coupne.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Coupne::whereId($id)->delete([]);
        toastr()->warning('coupon updated');
        return redirect()->back();
    }
}
