<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypePaymentCreateRequest;
use App\Models\TypePayment;
use Illuminate\Http\Request;

class TypePaymentController extends Controller
{

    public function index()
    {
        $typePayment = TypePayment::with('user')->orderBy('id','desc')->get();
        return view('master.typePayment.index',['typePaymentList' => $typePayment]);
    }


    public function create()
    {
        return view('master.typePayment.partials.create');
    }


    public function store(TypePaymentCreateRequest $request)
    {
        $typePayment = new TypePayment();

        $typePayment = TypePayment::create($request->all());
        $typePayment->name = strtoupper($request->name);
        $typePayment->user_id = strtoupper($request->user_id);
        $typePayment->save();

        $notification = array(
            'message' => 'Type Payment Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typePayment')->with($notification);
    }


    public function show($id)
    {
        $typePayment = TypePayment::find($id);
        return view('master.typePayment.partials.show', ['typePayment' => $typePayment]);
    }


    public function edit(TypePayment $typePayment, $id)
    {
        $typePayment = TypePayment::findOrfail($id);
        return view('master.typePayment.partials.edit', ['typePayment' => $typePayment]);
    }


    public function update(Request $request, $id)
    {
        $typePayment = TypePayment::findOrfail($id);

        $typePayment->update($request->all());
        $typePayment->name = strtoupper($request->name);
        $typePayment->user_id = strtoupper($request->user_id);
        $typePayment->save();

        $notification = array(
            'message' => 'Data Type Payment Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typePayment')->with($notification);
    }


    public function destroy($id)
    {
        $typePayment = TypePayment::findOrFail($id);
        TypePayment::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type Payment Deleted Successfully');
    }
}
