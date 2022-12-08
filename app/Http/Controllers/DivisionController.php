<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionCreateRequest;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{

    public function index()
    {
        $division = Division::orderBy('id', 'desc')->get();
        return view('master.division.index',['divisionList' => $division]);
    }


    public function create()
    {
        return view('master.division.partials.create');
    }


    public function store(DivisionCreateRequest $request)
    {
        $division = new Division();

        $division = Division::create($request->all());
        $division->name = strtoupper($request->name);
        $division->save();

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('division')->with($notification);
    }


    public function show($id)
    {
        $division = Division::find($id);
        return view('master.division.partials.show', ['division' => $division]);
    }


    public function edit(Division $division, $id)
    {
        $division = Division::findOrfail($id);
        return view('master.division.partials.edit', ['division' => $division]);
    }


    public function update(Request $request, $id)
    {
        $division = Division::findOrfail($id);

        $division->update($request->all());
        $division->name = strtoupper($request->name);
        $division->save();

        $notification = array(
            'message' => 'Data Division Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('division')->with($notification);
    }


    public function destroy($id)
    {
        $division = Division::findOrFail($id);
        Division::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Division Deleted Successfully');
    }
}
