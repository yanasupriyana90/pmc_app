<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipperCreateRequest;
use App\Models\MandatoryTax;
use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function index()
    {
        $shipper = Shipper::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.shipper.index',['shipperList' => $shipper]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.shipper.partials.create', ['shipper' => $mandatory_tax]);
    }


    public function store(ShipperCreateRequest $request)
    {
        $shipper = new Shipper;

        $shipper = Shipper::create($request->all());
        $shipper->code_shipper = strtoupper($request->code_shipper);
        $shipper->name = strtoupper($request->name);
        $shipper->address = strtoupper($request->address);
        $shipper->save();

        $notification = array(
            'message' => 'Shipper Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipper')->with($notification);
    }


    public function show($id)
    {
        // $shipper = Shipper::find($id);
        $shipper = Shipper::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.shipper.partials.show', ['shipper' => $shipper]);
    }


    public function edit(Shipper $shipper, $id)
    {
        $shipper = Shipper::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $shipper->mandatory_tax_id)->get(['id', 'name']);
        return view('master.shipper.partials.edit', ['shipper' => $shipper, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(ShipperCreateRequest $request, $id)
    {
        $shipper = Shipper::findOrfail($id);

        $shipper->update($request->all());
        $shipper->code_shipper = strtoupper($request->code_shipper);
        $shipper->name = strtoupper($request->name);
        $shipper->address = strtoupper($request->address);
        $shipper->email = strtolower($request->email);
        $shipper->save();

        $notification = array(
            'message' => 'Data Shipper Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipper')->with($notification);
    }


    public function destroy($id)
    {
        $shipper = Shipper::findOrFail($id);
        Shipper::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Shipper Deleted Successfully');
    }
}
