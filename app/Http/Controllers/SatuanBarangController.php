<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatuanBarangCreateRequest;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuanBarang = SatuanBarang::with('user')->orderBy('id','desc')->get();
        return view('master.satuanBarang.index',['satuanBarangList' => $satuanBarang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.satuanBarang.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SatuanBarangCreateRequest $request)
    {
        $satuanBarang = new SatuanBarang();

        $satuanBarang = SatuanBarang::create($request->all());
        $satuanBarang->name = strtoupper($request->name);
        $satuanBarang->user_id = strtoupper($request->user_id);
        $satuanBarang->save();

        $notification = array(
            'message' => 'Satuan Barang Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('satuanBarang')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuanBarang = SatuanBarang::find($id);
        return view('master.satuanBarang.partials.show', ['satuanBarang' => $satuanBarang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanBarang $satuanBarang, $id)
    {
        $satuanBarang = SatuanBarang::findOrfail($id);
        return view('master.satuanBarang.partials.edit', ['satuanBarang' => $satuanBarang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(SatuanBarangCreateRequest $request, $id)
    {
        $satuanBarang = SatuanBarang::findOrfail($id);

        $satuanBarang->update($request->all());
        $satuanBarang->name = strtoupper($request->name);
        $satuanBarang->save();

        $notification = array(
            'message' => 'Data Satuan Barang Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('satuanBarang')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuanBarang = SatuanBarang::findOrFail($id);
        SatuanBarang::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Satuan Barang Deleted Successfully');
    }
}
