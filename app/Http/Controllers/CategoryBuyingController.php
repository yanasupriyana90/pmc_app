<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryBuyingCreateRequest;
use App\Models\CategoryBuying;
use Illuminate\Http\Request;

class CategoryBuyingController extends Controller
{

    public function index()
    {
        $categoryBuying = CategoryBuying::with('user')->orderBy('id','desc')->get();
        return view('master.categoryBuying.index',['categoryBuyingList' => $categoryBuying]);
    }


    public function create()
    {
        return view('master.categoryBuying.partials.create');
    }


    public function store(CategoryBuyingCreateRequest $request)
    {
        $categoryBuying = new CategoryBuying();

        $categoryBuying = CategoryBuying::create($request->all());
        $categoryBuying->name = strtoupper($request->name);
        $categoryBuying->user_id = strtoupper($request->user_id);
        $categoryBuying->save();

        $notification = array(
            'message' => 'Category Buying Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categoryBuying')->with($notification);
    }


    public function show($id)
    {
        $categoryBuying = CategoryBuying::find($id);
        return view('master.categoryBuying.partials.show', ['categoryBuying' => $categoryBuying]);
    }


    public function edit(CategoryBuying $categoryBuying, $id)
    {
        $categoryBuying = CategoryBuying::findOrfail($id);
        return view('master.categoryBuying.partials.edit', ['categoryBuying' => $categoryBuying]);
    }


    public function update(Request $request, $id)
    {
        $categoryBuying = CategoryBuying::findOrfail($id);

        $categoryBuying->update($request->all());
        $categoryBuying->name = strtoupper($request->name);
        $categoryBuying->user_id = strtoupper($request->user_id);
        $categoryBuying->save();

        $notification = array(
            'message' => 'Data Category Buying Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categoryBuying')->with($notification);
    }


    public function destroy($id)
    {
        $categoryBuying = CategoryBuying::findOrFail($id);
        CategoryBuying::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Category Buying Deleted Successfully');
    }
}
