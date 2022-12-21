<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsigneeCreateRequest;
use App\Models\MandatoryTax;
use App\Models\Consignee;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    public function index()
    {
        $consignee = Consignee::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.consignee.index',['consigneeList' => $consignee]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.consignee.partials.create', ['consignee' => $mandatory_tax]);
    }


    public function store(ConsigneeCreateRequest $request)
    {
        $consignee = new Consignee;

        $consignee = Consignee::create($request->all());
        $consignee->code_consignee = strtoupper($request->code_consignee);
        $consignee->name = strtoupper($request->name);
        $consignee->address = strtoupper($request->address);
        $consignee->save();

        $notification = array(
            'message' => 'Consignee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('consignee')->with($notification);
    }


    public function show($id)
    {
        // $consignee = consignee::find($id);
        $consignee = Consignee::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.consignee.partials.show', ['consignee' => $consignee]);
    }


    public function edit(Consignee $consignee, $id)
    {
        $consignee = Consignee::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $consignee->mandatory_tax_id)->get(['id', 'name']);
        return view('master.consignee.partials.edit', ['consignee' => $consignee, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(ConsigneeCreateRequest $request, $id)
    {
        $consignee = Consignee::findOrfail($id);

        $consignee->update($request->all());
        $consignee->code_consignee = strtoupper($request->code_consignee);
        $consignee->name = strtoupper($request->name);
        $consignee->address = strtoupper($request->address);
        $consignee->save();

        $notification = array(
            'message' => 'Data Consignee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('consignee')->with($notification);
    }


    public function destroy($id)
    {
        $consignee = Consignee::findOrFail($id);
        Consignee::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Consignee Deleted Successfully');
    }
}
