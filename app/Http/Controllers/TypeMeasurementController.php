<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeMeasurementCreateRequest;
use App\Models\TypeMeasurement;
use Illuminate\Http\Request;

class TypeMeasurementController extends Controller
{

    public function index()
    {
        $typeMeasurement = TypeMeasurement::with('user')->orderBy('id','desc')->get();
        return view('master.typeMeasurement.index',['typeMeasurementList' => $typeMeasurement]);
    }


    public function create()
    {
        return view('master.typeMeasurement.partials.create');
    }


    public function store(TypeMeasurementCreateRequest $request)
    {
        $typeMeasurement = new TypeMeasurement();

        $typeMeasurement = TypeMeasurement::create($request->all());
        $typeMeasurement->code_measurement = strtoupper($request->code_measurement);
        $typeMeasurement->name = strtoupper($request->name);
        $typeMeasurement->user_id = strtoupper($request->user_id);
        $typeMeasurement->save();

        $notification = array(
            'message' => 'Type Measurement Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeMeasurement')->with($notification);
    }


    public function show($id)
    {
        $typeMeasurement = TypeMeasurement::find($id);
        return view('master.typeMeasurement.partials.show', ['typeMeasurement' => $typeMeasurement]);
    }


    public function edit(TypeMeasurement $typeMeasurement, $id)
    {
        $typeMeasurement = TypeMeasurement::findOrfail($id);
        return view('master.typeMeasurement.partials.edit', ['typeMeasurement' => $typeMeasurement]);
    }


    public function update(Request $request, $id)
    {
        $typeMeasurement = TypeMeasurement::findOrfail($id);

        $typeMeasurement->update($request->all());
        $typeMeasurement->code_measurement = strtoupper($request->code_measurement);
        $typeMeasurement->name = strtoupper($request->name);
        $typeMeasurement->user_id = strtoupper($request->user_id);
        $typeMeasurement->save();

        $notification = array(
            'message' => 'Data Type Measurement Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeMeasurement')->with($notification);
    }


    public function destroy($id)
    {
        $typeMeasurement = TypeMeasurement::findOrFail($id);
        TypeMeasurement::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type Measurement Deleted Successfully');
    }
}
