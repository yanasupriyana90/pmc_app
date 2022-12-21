<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySellingCreateRequest;
use App\Models\CategorySelling;
use Illuminate\Http\Request;

class CategorySellingController extends Controller
{

    public function index()
    {
        $categorySelling = CategorySelling::with('user')->orderBy('id','desc')->get();
        return view('master.categorySelling.index',['categorySellingList' => $categorySelling]);
    }


    public function create()
    {
        return view('master.categorySelling.partials.create');
    }


    public function store(CategorySellingCreateRequest $request)
    {
        $categorySelling = new CategorySelling();

        $categorySelling = CategorySelling::create($request->all());
        $categorySelling->name = strtoupper($request->name);
        $categorySelling->user_id = strtoupper($request->user_id);
        $categorySelling->save();

        $notification = array(
            'message' => 'Category Selling Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categorySelling')->with($notification);
    }


    public function show($id)
    {
        $categorySelling = CategorySelling::find($id);
        return view('master.categorySelling.partials.show', ['categorySelling' => $categorySelling]);
    }


    public function edit(CategorySelling $categorySelling, $id)
    {
        $categorySelling = CategorySelling::findOrfail($id);
        return view('master.categorySelling.partials.edit', ['categorySelling' => $categorySelling]);
    }


    public function update(Request $request, $id)
    {
        $categorySelling = CategorySelling::findOrfail($id);

        $categorySelling->update($request->all());
        $categorySelling->name = strtoupper($request->name);
        $categorySelling->user_id = strtoupper($request->user_id);
        $categorySelling->save();

        $notification = array(
            'message' => 'Data Category Selling Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categorySelling')->with($notification);
    }


    public function destroy($id)
    {
        $categorySelling = CategorySelling::findOrFail($id);
        CategorySelling::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Category Selling Deleted Successfully');
    }
}
