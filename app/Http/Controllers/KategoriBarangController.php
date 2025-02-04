<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriBarangCreateRequest;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriBarang = KategoriBarang::with('user')->orderBy('id', 'desc')->get();
        return view('master.kategoriBarang.index', ['kategoriBarangList' => $kategoriBarang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.kategoriBarang.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriBarangCreateRequest $request)
    {
        $kategoriBarang = new KategoriBarang();

        $kategoriBarang = KategoriBarang::create($request->all());
        $kategoriBarang->name = strtoupper($request->name);
        $kategoriBarang->save();

        $notification = array(
            'message' => 'Kategori Barang Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('kategoriBarang')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoriBarang = KategoriBarang::with('user')->findOrFail($id);
        return view('master.kategoriBarang.partials.show', ['kategoriBarang' => $kategoriBarang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBarang $kategoriBarang, $id)
    {
        $kategoriBarang = KategoriBarang::findOrFail($id);
        return view ('master.kategoriBarang.partials.edit', ['kategoriBarang' => $kategoriBarang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $kategoriBarang = KategoriBarang::findOrfail($id);

        $kategoriBarang->update($request->all());
        $kategoriBarang->name = strtoupper($request->name);
        $kategoriBarang->save();

        $notification = array(
            'message' => 'Data Kategori Barang Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('kategoriBarang')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriBarang = KategoriBarang::findOrFail($id);
        KategoriBarang::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Kategori Barang Deleted Successfully');
    }
}
