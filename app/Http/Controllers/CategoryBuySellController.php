<?php

namespace App\Http\Controllers;

use App\Models\CategoryBuySell;
use App\Http\Requests\CategoryBuySellCreateRequest;
use Illuminate\Http\Request;

class CategoryBuySellController extends Controller
{

    public function index()
    {
        $categoryBuySell = CategoryBuySell::with('user')->orderBy('id','desc')->get();
        return view('master.categoryBuySell.index',['categoryBuySellList' => $categoryBuySell]);
    }


    public function create()
    {
        return view('master.categoryBuySell.partials.create');
    }


    public function store(CategoryBuySellCreateRequest $request)
    {
        $categoryBuySell = new CategoryBuySell();

        $categoryBuySell = CategoryBuySell::create($request->all());
        $categoryBuySell->name = strtoupper($request->name);
        $categoryBuySell->user_id = strtoupper($request->user_id);
        $categoryBuySell->save();

        $notification = array(
            'message' => 'Category Buy & Sell Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categoryBuySell')->with($notification);
    }


    public function show($id)
    {
        $categoryBuySell = CategoryBuySell::find($id);
        return view('master.categoryBuySell.partials.show', ['categoryBuySell' => $categoryBuySell]);
    }


    public function edit(CategoryBuySell $categoryBuySell, $id)
    {
        $categoryBuySell = CategoryBuySell::findOrfail($id);
        return view('master.categoryBuySell.partials.edit', ['categoryBuySell' => $categoryBuySell]);
    }


    public function update(Request $request, $id)
    {
        $categoryBuySell = CategoryBuySell::findOrfail($id);

        $categoryBuySell->update($request->all());
        $categoryBuySell->name = strtoupper($request->name);
        $categoryBuySell->user_id = strtoupper($request->user_id);
        $categoryBuySell->save();

        $notification = array(
            'message' => 'Data Category Buy & Sell Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categoryBuySell')->with($notification);
    }


    public function destroy($id)
    {
        $categoryBuySell = CategoryBuySell::findOrFail($id);
        CategoryBuySell::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Category Buy & Sell Deleted Successfully');
    }
}
