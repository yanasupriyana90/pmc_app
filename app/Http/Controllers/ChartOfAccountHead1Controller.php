<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChartOfAccountHead1CreateRequest;
use App\Models\ChartOfAccountHead1;
use Illuminate\Http\Request;

class ChartOfAccountHead1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chartOfAccountHead1 = ChartOfAccountHead1::orderBy('id')->get();
        return view('master.accounting.chartOfAccount.index', ['chartOfAccountHead1List' => $chartOfAccountHead1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.accounting.chartOfAccount.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartOfAccountHead1CreateRequest $request)
    {
        $chartOfAccountHead1 = new ChartOfAccountHead1();
        $chartOfAccountHead1 = ChartOfAccountHead1::create($request->all());
        $chartOfAccountHead1->desc = strtoupper($request->desc);
        $chartOfAccountHead1->save();

        $notification = array(
            'message' => 'Chart Of Account Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('chartOfAccountHead1')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartOfAccountHead1  $chartOfAccountHead1
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chartOfAccountHead1 = ChartOfAccountHead1::find($id);
        return view('master.accounting.chartOfAccount.partials.show', ['chartOfAccountHead1' => $chartOfAccountHead1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChartOfAccountHead1  $chartOfAccountHead1
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartOfAccountHead1 $chartOfAccountHead1, $id)
    {
        $chartOfAccountHead1 = ChartOfAccountHead1::findOrFail($id);
        return view('master.accounting.chartOfAccount.partials.edit', ['chartOfAccountHead1' => $chartOfAccountHead1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChartOfAccountHead1  $chartOfAccountHead1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chartOfAccountHead1 = ChartOfAccountHead1::findOrFail($id);
        $chartOfAccountHead1->update($request->all());
        $chartOfAccountHead1->desc = strtoupper($request->desc);
        $chartOfAccountHead1->save();

        $notification = array(
            'message' => 'Data Chart Of Account Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('chartOfAccountHead1')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartOfAccountHead1  $chartOfAccountHead1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chartOfAccountHead1 = ChartOfAccountHead1::findOrFail($id);
        ChartOfAccountHead1::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Chart Of Account Deleted Successfully');
    }
}
