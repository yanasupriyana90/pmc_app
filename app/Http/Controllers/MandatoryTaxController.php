<?php

namespace App\Http\Controllers;

use App\Http\Requests\MandatoryTaxCreateRequest;
use App\Models\MandatoryTax;
use Illuminate\Http\Request;

class MandatoryTaxController extends Controller
{

    public function index()
    {
        $mandatoryTax = MandatoryTax::with('user')->orderBy('id','desc')->get();
        return view('master.mandatoryTax.index',['mandatoryTaxList' => $mandatoryTax]);
    }


    public function create()
    {
        return view('master.mandatoryTax.partials.create');
    }


    public function store(MandatoryTaxCreateRequest $request)
    {
        $mandatoryTax = new MandatoryTax();

        $mandatoryTax = MandatoryTax::create($request->all());
        $mandatoryTax->name = strtoupper($request->name);
        $mandatoryTax->user_id = strtoupper($request->user_id);
        $mandatoryTax->save();

        $notification = array(
            'message' => 'Mandatory Tax Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('mandatoryTax')->with($notification);
    }


    public function show($id)
    {
        $mandatoryTax = MandatoryTax::find($id);
        return view('master.mandatoryTax.partials.show', ['mandatoryTax' => $mandatoryTax]);
    }


    public function edit(MandatoryTax $mandatoryTax, $id)
    {
        $mandatoryTax = MandatoryTax::findOrfail($id);
        return view('master.mandatoryTax.partials.edit', ['mandatoryTax' => $mandatoryTax]);
    }


    public function update(Request $request, $id)
    {
        $mandatoryTax = MandatoryTax::findOrfail($id);

        $mandatoryTax->update($request->all());
        $mandatoryTax->name = strtoupper($request->name);
        $mandatoryTax->user_id = strtoupper($request->user_id);
        $mandatoryTax->save();

        $notification = array(
            'message' => ' Mandatory Tax Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('mandatoryTax')->with($notification);
    }


    public function destroy($id)
    {
        $mandatoryTax = MandatoryTax::findOrFail($id);
        MandatoryTax::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', ' Mandatory Tax Deleted Successfully');
    }
}
