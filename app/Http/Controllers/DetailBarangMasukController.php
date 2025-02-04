<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailBarangMasuk;
use Illuminate\Http\Request;

class DetailBarangMasukController extends Controller
{
    public function findByBarcode(Request $request)
    {
        $barang = Barang::where('barcode', $request->kode_barang)->first();

        if ($barang) {
            return response()->json([
                'success' => true,
                'barang' => $barang
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailBarangMasuk  $detailBarangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(DetailBarangMasuk $detailBarangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailBarangMasuk  $detailBarangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailBarangMasuk $detailBarangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailBarangMasuk  $detailBarangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailBarangMasuk $detailBarangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailBarangMasuk  $detailBarangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailBarangMasuk $detailBarangMasuk)
    {
        //
    }
}
