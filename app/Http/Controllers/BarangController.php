<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangCreateRequest;
use App\Models\Barang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('user',)->orderBy('id', 'desc')->get();
        return view('master.barang.index', ['barangList' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuanBarang = SatuanBarang::select('id', 'name')->get();
        return view('master.barang.partials.create', ['barang' => $satuanBarang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangCreateRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();

        if ($barang = Barang::create($params)) {
            $barang->image = $imagePath;
            $barang->sku = strtoupper($barang->sku);
            $barang->nama = strtoupper($barang->nama);
            $barang->merk = strtoupper($barang->merk);
            $barang->desk = strtoupper($barang->desk);
            $barang->save();

            $notification = array(
                'message' => 'Data Barang Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect(route('barang'))->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
