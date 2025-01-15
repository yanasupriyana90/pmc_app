<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCurrencyCreateRequest;
use App\Models\TypeCurrency;
use Illuminate\Http\Request;

class TypeCurrencyController extends Controller
{

    public function index()
    {
        $typeCurrency = TypeCurrency::with('user')->orderBy('id','desc')->get();
        return view('master.typeCurrency.index',['typeCurrencyList' => $typeCurrency]);
    }


    public function create()
    {
        return view('master.typeCurrency.partials.create');
    }


    public function store(TypeCurrencyCreateRequest $request)
    {
        $typeCurrency = new TypeCurrency();

        $typeCurrency = TypeCurrency::create($request->all());
        $typeCurrency->code_currency = strtoupper($request->code_currency);
        $typeCurrency->name = strtoupper($request->name);
        $typeCurrency->save();

        $notification = array(
            'message' => 'Type Currency Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeCurrency')->with($notification);
    }


    public function show($id)
    {
        $typeCurrency = TypeCurrency::find($id);
        return view('master.typeCurrency.partials.show', ['typeCurrency' => $typeCurrency]);
    }


    public function edit(TypeCurrency $typeCurrency, $id)
    {
        $typeCurrency = TypeCurrency::findOrfail($id);
        return view('master.typeCurrency.partials.edit', ['typeCurrency' => $typeCurrency]);
    }


    public function update(Request $request, $id)
    {
        $typeCurrency = TypeCurrency::findOrfail($id);

        $typeCurrency->update($request->all());
        $typeCurrency->code_currency = strtoupper($request->code_currency);
        $typeCurrency->name = strtoupper($request->name);
        $typeCurrency->save();

        $notification = array(
            'message' => 'Data Type Currency Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('typeCurrency')->with($notification);
    }


    public function destroy($id)
    {
        $typeCurrency = TypeCurrency::findOrFail($id);
        TypeCurrency::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Type Currency Deleted Successfully');
    }
}
