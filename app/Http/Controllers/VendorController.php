<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorCreateRequest;
use App\Models\MandatoryTax;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::with('user', 'mandatoryTax')->orderBy('id', 'desc')->get();
        return view('master.vendor.index', ['vendorList' => $vendor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.vendor.partials.create', ['vendor' => $mandatory_tax]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorCreateRequest $request)
    {
        $vendor = new Vendor;

        $vendor = Vendor::create($request->all());
        $vendor->initial_code = strtoupper($request->initial_code);
        $vendor->name = strtoupper($request->name);
        $vendor->address = strtoupper($request->address);
        $vendor->pic_name = strtoupper($request->pic_name);
        $vendor->email = strtolower($request->email);
        $vendor->save();

        $notification = array(
            'message' => 'Vendor Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.vendor.partials.show', ['vendor' => $vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor, $id)
    {
        $vendor = Vendor::with('mandatoryTax')->findOrFail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $vendor->mandatory_tax_id)->get(['id', 'name']);
        return view ('master.vendor.partials.edit', ['vendor' => $vendor, 'mandatoryTax' => $mandatoryTax]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorCreateRequest $request, $id)
    {
        $vendor = Vendor::findOrfail($id);

        $vendor->update($request->all());
        $vendor->name = strtoupper($request->name);
        $vendor->address = strtoupper($request->address);
        $vendor->pic_name = strtoupper($request->pic_name);
        $vendor->email = strtolower($request->email);
        $vendor->save();

        $notification = array(
            'message' => 'Data Vendor Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::findOrfail($id);
        Vendor::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Vendor Deleted Successfully');
    }
}
