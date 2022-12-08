<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypePackagingCreateRequest;
use App\Models\TypePackaging;
use Illuminate\Http\Request;

class TypePackagingController extends Controller
{

    public function index()
    {
        $typePackaging = TypePackaging::with('user')->orderBy('id','desc')->get();
        return view('master.typePackaging.index',['typePackagingList' => $typePackaging]);
    }


    public function create()
    {
        return view('master.typePackaging.partials.create');
    }


    public function store(TypePackagingCreateRequest $request)
    {
        $typePackaging = new TypePackaging();

        $typePackaging = TypePackaging::create($request->all());
        $typePackaging->name = strtoupper($request->name);
        $typePackaging->user_id = strtoupper($request->user_id);
        $typePackaging->save();

        $notification = array(
            'message' => 'Type Packaging Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typePackaging')->with($notification);
    }


    public function show($id)
    {
        $typePackaging = TypePackaging::find($id);
        return view('master.typePackaging.partials.show', ['typePackaging' => $typePackaging]);
    }


    public function edit(TypePackaging $typePackaging, $id)
    {
        $typePackaging = TypePackaging::findOrfail($id);
        return view('master.typePackaging.partials.edit', ['typePackaging' => $typePackaging]);
    }


    public function update(Request $request, $id)
    {
        $typePackaging = TypePackaging::findOrfail($id);

        $typePackaging->update($request->all());
        $typePackaging->name = strtoupper($request->name);
        $typePackaging->user_id = strtoupper($request->user_id);
        $typePackaging->save();

        $notification = array(
            'message' => 'Data Type Packaging Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typePackaging')->with($notification);
    }


    public function destroy($id)
    {
        $typePackaging = TypePackaging::findOrFail($id);
        TypePackaging::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type Packaging Deleted Successfully');
    }
}
