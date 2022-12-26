<?php

namespace App\Http\Controllers;

use App\Http\Requests\UndernameMblCreateRequest;
use App\Models\MandatoryTax;
use App\Models\UndernameMbl;
use Illuminate\Http\Request;

class UndernameMblController extends Controller
{
    public function index()
    {
        $undernameMbl = UndernameMbl::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.undernameMbl.index',['undernameMblList' => $undernameMbl]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.undernameMbl.partials.create', ['undernameMbl' => $mandatory_tax]);
    }


    public function store(UndernameMblCreateRequest $request)
    {
        $undernameMbl = new UndernameMbl;

        $undernameMbl = UndernameMbl::create($request->all());
        $undernameMbl->code_undername_mbl = strtoupper($request->code_undername_mbl);
        $undernameMbl->name = strtoupper($request->name);
        $undernameMbl->address = strtoupper($request->address);
        $undernameMbl->email = strtolower($request->email);
        $undernameMbl->save();

        $notification = array(
            'message' => 'Undername M-BL / Booking Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undernameMbl')->with($notification);
    }


    public function show($id)
    {
        // $undername = undername::find($id);
        $undernameMbl = UndernameMbl::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.undernameMbl.partials.show', ['undernameMbl' => $undernameMbl]);
    }


    public function edit(UndernameMbl $undernameMbl, $id)
    {
        $undernameMbl = UndernameMbl::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $undernameMbl->mandatory_tax_id)->get(['id', 'name']);
        return view('master.undernameMbl.partials.edit', ['undernameMbl' => $undernameMbl, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(UndernameMblCreateRequest $request, $id)
    {
        $undernameMbl = UndernameMbl::findOrfail($id);

        $undernameMbl->update($request->all());
        $undernameMbl->code_undername_mbl = strtoupper($request->code_undername_mbl);
        $undernameMbl->name = strtoupper($request->name);
        $undernameMbl->address = strtoupper($request->address);
        $undernameMbl->save();

        $notification = array(
            'message' => 'Data Undername M-BL / Booking Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undernameMbl')->with($notification);
    }


    public function destroy($id)
    {
        $undernameMbl = UndernameMbl::findOrFail($id);
        UndernameMbl::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Undername M-BL / Booking Deleted Successfully');
    }
}
