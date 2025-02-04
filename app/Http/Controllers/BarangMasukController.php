<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\Vendor;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::with('vendor', 'user')->orderBy('id', 'desc')->get();
        return view('transaksi.barangMasuk.index', ['barangMasukList' => $barangMasuk]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomorInvoice = BarangMasuk::generateTransactionCode();
        $vendor = Vendor::select('id', 'name')->get();
        return view('transaksi.barangMasuk.partials.create', compact('nomorInvoice', 'vendor'));
    }

    public function getVendors($nameVendor)
    {
        if (empty($nameVendor)) {
            return [];
        }
        $vendors = Vendor::with(['mandatoryTax'])
            ->select('id', 'name', 'address', 'pic_name', 'phone_1', 'phone_2', 'email', 'mandatory_tax_id', 'tax_id')
            ->where('name', 'LIKE', "%$nameVendor%")
            ->limit(25)
            ->get();

        return $vendors;
    }

    public function findByBarcode(Request $request)
    {
        $product = Barang::where('kode_barang', $request->barcode)->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
        }
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
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
}
