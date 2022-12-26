<?php

namespace App\Http\Controllers;

use App\Http\Requests\UndernameHblCreateRequest;
use App\Models\MandatoryTax;
use App\Models\UndernameHbl;
use Illuminate\Http\Request;

class UndernameHblController extends Controller
{
    public function index()
    {
        $undernameHbl = UndernameHbl::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.undernameHbl.index',['undernameHblList' => $undernameHbl]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.undernameHbl.partials.create', ['undernameHbl' => $mandatory_tax]);
    }


    public function store(UndernameHblCreateRequest $request)
    {
        $undernameHbl = new UndernameHbl;

        $undernameHbl = UndernameHbl::create($request->all());
        $undernameHbl->code_undername_hbl = strtoupper($request->code_undername_hbl);
        $undernameHbl->name = strtoupper($request->name);
        $undernameHbl->address = strtoupper($request->address);
        $undernameHbl->email = strtolower($request->email);
        $undernameHbl->save();

        $notification = array(
            'message' => 'Undername H-BL / PEB Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undernameHbl')->with($notification);
    }


    public function show($id)
    {
        // $undername = undername::find($id);
        $undernameHbl = UndernameHbl::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.undernameHbl.partials.show', ['undernameHbl' => $undernameHbl]);
    }


    public function edit(UndernameHbl $undernameHbl, $id)
    {
        $undernameHbl = UndernameHbl::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $undernameHbl->mandatory_tax_id)->get(['id', 'name']);
        return view('master.undernameHbl.partials.edit', ['undernameHbl' => $undernameHbl, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(UndernameHblCreateRequest $request, $id)
    {
        $undernameHbl = UndernameHbl::findOrfail($id);

        $undernameHbl->update($request->all());
        $undernameHbl->code_undername_hbl = strtoupper($request->code_undername_hbl);
        $undernameHbl->name = strtoupper($request->name);
        $undernameHbl->address = strtoupper($request->address);
        $undernameHbl->save();

        $notification = array(
            'message' => 'Data Undername H-BL / PEB Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undernameHbl')->with($notification);
    }


    public function destroy($id)
    {
        $undernameHbl = UndernameHbl::findOrFail($id);
        UndernameHbl::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Undername H-BL / PEB Deleted Successfully');
    }
}
