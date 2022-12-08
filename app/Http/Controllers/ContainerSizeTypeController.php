<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContainerSizeTypeCreateRequest;
use App\Models\ContainerSizeType;
use Illuminate\Http\Request;

class ContainerSizeTypeController extends Controller
{

    public function index()
    {
        $containerSizeType = ContainerSizeType::with('user')->orderBy('id','desc')->get();
        return view('master.containerSizeType.index',['containerSizeTypeList' => $containerSizeType]);
    }


    public function create()
    {
        return view('master.containerSizeType.partials.create');
    }


    public function store(ContainerSizeTypeCreateRequest $request)
    {
        $containerSizeType = new ContainerSizeType();

        $containerSizeType = ContainerSizeType::create($request->all());
        $containerSizeType->name = strtoupper($request->name);
        $containerSizeType->user_id = strtoupper($request->user_id);
        $containerSizeType->save();

        $notification = array(
            'message' => 'Container Size Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('containerSizeType')->with($notification);
    }


    public function show($id)
    {
        $containerSizeType = ContainerSizeType::find($id);
        return view('master.containerSizeType.partials.show', ['containerSizeType' => $containerSizeType]);
    }


    public function edit(ContainerSizeType $containerSizeType, $id)
    {
        $containerSizeType = ContainerSizeType::findOrfail($id);
        return view('master.containerSizeType.partials.edit', ['containerSizeType' => $containerSizeType]);
    }


    public function update(Request $request, $id)
    {
        $containerSizeType = ContainerSizeType::findOrfail($id);

        $containerSizeType->update($request->all());
        $containerSizeType->name = strtoupper($request->name);
        $containerSizeType->user_id = strtoupper($request->user_id);
        $containerSizeType->save();

        $notification = array(
            'message' => 'Data Container Size Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('containerSizeType')->with($notification);
    }


    public function destroy($id)
    {
        $containerSizeType = ContainerSizeType::findOrFail($id);
        ContainerSizeType::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Container Size Type Deleted Successfully');
    }
}
