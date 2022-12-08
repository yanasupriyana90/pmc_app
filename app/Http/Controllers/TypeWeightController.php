<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeWeightCreateRequest;
use App\Models\TypeWeight;
use Illuminate\Http\Request;

class TypeWeightController extends Controller
{

    public function index()
    {
        $typeWeight = TypeWeight::with('user')->orderBy('id','desc')->get();
        return view('master.typeWeight.index',['typeWeightList' => $typeWeight]);
    }


    public function create()
    {
        return view('master.typeWeight.partials.create');
    }


    public function store(TypeWeightCreateRequest $request)
    {
        $typeWeight = new TypeWeight();

        $typeWeight = TypeWeight::create($request->all());
        $typeWeight->code_weight = strtoupper($request->code_weight);
        $typeWeight->name = strtoupper($request->name);
        $typeWeight->user_id = strtoupper($request->user_id);
        $typeWeight->save();

        $notification = array(
            'message' => 'Type Weight Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeWeight')->with($notification);
    }


    public function show($id)
    {
        $typeWeight = TypeWeight::find($id);
        return view('master.typeWeight.partials.show', ['typeWeight' => $typeWeight]);
    }


    public function edit(TypeWeight $typeWeight, $id)
    {
        $typeWeight = TypeWeight::findOrfail($id);
        return view('master.typeWeight.partials.edit', ['typeWeight' => $typeWeight]);
    }


    public function update(Request $request, $id)
    {
        $typeWeight = TypeWeight::findOrfail($id);

        $typeWeight->update($request->all());
        $typeWeight->code_weight = strtoupper($request->code_weight);
        $typeWeight->name = strtoupper($request->name);
        $typeWeight->user_id = strtoupper($request->user_id);
        $typeWeight->save();

        $notification = array(
            'message' => 'Data Type Weight Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeWeight')->with($notification);
    }


    public function destroy($id)
    {
        $typeWeight = TypeWeight::findOrFail($id);
        TypeWeight::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type Weight Deleted Successfully');
    }
}
