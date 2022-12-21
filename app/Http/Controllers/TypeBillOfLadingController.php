<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeBillOfLadingCreateRequest;
use App\Models\TypeBillOfLading;
use Illuminate\Http\Request;

class TypeBillOfLadingController extends Controller
{

    public function index()
    {
        $typeBillOfLading = TypeBillOfLading::with('user')->orderBy('id','desc')->get();
        return view('master.typeBillOfLading.index',['typeBillOfLadingList' => $typeBillOfLading]);
    }


    public function create()
    {
        return view('master.typeBillOfLading.partials.create');
    }


    public function store(TypeBillOfLadingCreateRequest $request)
    {
        $typeBillOfLading = new TypeBillOfLading();

        $typeBillOfLading = TypeBillOfLading::create($request->all());
        $typeBillOfLading->name = strtoupper($request->name);
        $typeBillOfLading->user_id = strtoupper($request->user_id);
        $typeBillOfLading->save();

        $notification = array(
            'message' => 'Type BillOfLading Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeBillOfLading')->with($notification);
    }


    public function show($id)
    {
        $typeBillOfLading = TypeBillOfLading::find($id);
        return view('master.typeBillOfLading.partials.show', ['typeBillOfLading' => $typeBillOfLading]);
    }


    public function edit(TypeBillOfLading $typeBillOfLading, $id)
    {
        $typeBillOfLading = TypeBillOfLading::findOrfail($id);
        return view('master.typeBillOfLading.partials.edit', ['typeBillOfLading' => $typeBillOfLading]);
    }


    public function update(Request $request, $id)
    {
        $typeBillOfLading = TypeBillOfLading::findOrfail($id);

        $typeBillOfLading->update($request->all());
        $typeBillOfLading->name = strtoupper($request->name);
        $typeBillOfLading->user_id = strtoupper($request->user_id);
        $typeBillOfLading->save();

        $notification = array(
            'message' => 'Data Type BillOfLading Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeBillOfLading')->with($notification);
    }


    public function destroy($id)
    {
        $typeBillOfLading = TypeBillOfLading::findOrFail($id);
        TypeBillOfLading::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type BillOfLading Deleted Successfully');
    }
}
