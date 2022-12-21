<?php

namespace App\Http\Controllers;

use App\Http\Requests\UndernameCreateRequest;
use App\Models\MandatoryTax;
use App\Models\Undername;
use Illuminate\Http\Request;

class UndernameController extends Controller
{
    public function index()
    {
        $undername = Undername::with('user', 'mandatoryTax')->orderBy('id','desc')->get();
        return view('master.undername.index',['undernameList' => $undername]);
    }


    public function create()
    {
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        return view('master.undername.partials.create', ['undername' => $mandatory_tax]);
    }


    public function store(UndernameCreateRequest $request)
    {
        $undername = new Undername;

        $undername = Undername::create($request->all());
        $undername->code_undername = strtoupper($request->code_undername);
        $undername->name = strtoupper($request->name);
        $undername->address = strtoupper($request->address);
        $undername->save();

        $notification = array(
            'message' => 'undername Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undername')->with($notification);
    }


    public function show($id)
    {
        // $undername = undername::find($id);
        $undername = Undername::with(['user', 'mandatoryTax'])->findOrFail($id);
        return view('master.undername.partials.show', ['undername' => $undername]);
    }


    public function edit(Undername $undername, $id)
    {
        $undername = Undername::with('mandatoryTax')->findOrfail($id);
        $mandatoryTax = MandatoryTax::where('id', '!=', $undername->mandatory_tax_id)->get(['id', 'name']);
        return view('master.undername.partials.edit', ['undername' => $undername, 'mandatoryTax' => $mandatoryTax]);
    }


    public function update(UndernameCreateRequest $request, $id)
    {
        $undername = Undername::findOrfail($id);

        $undername->update($request->all());
        $undername->code_undername = strtoupper($request->code_undername);
        $undername->name = strtoupper($request->name);
        $undername->address = strtoupper($request->address);
        $undername->save();

        $notification = array(
            'message' => 'Data Undername Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('undername')->with($notification);
    }


    public function destroy($id)
    {
        $undername = Undername::findOrFail($id);
        Undername::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Undername Deleted Successfully');
    }
}
