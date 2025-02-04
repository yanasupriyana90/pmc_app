<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangCreateRequest;
use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('user', 'kategoriBarang', 'satuanBarang')->orderBy('id', 'desc')->get();
        return view('master.barang.index', ['barangList' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('barangs')->select(DB::raw('MAX(RIGHT(kode_barang,5)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "00001";
        }

        $kategoriBarang = KategoriBarang::select('id', 'name')->get();
        $satuanBarang = SatuanBarang::select('id', 'name')->get();
        return view('master.barang.partials.create', compact('kd', 'kategoriBarang', 'satuanBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangCreateRequest $request)
    {

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        //create post
        Barang::create([
            'kode_barang' => strtoupper($request->kode_barang),
            'nama' => strtoupper($request->nama),
            'kategori_barang_id' => $request->kategori_barang_id,
            'merk' => strtoupper($request->merk),
            'panjang' => strtoupper($request->panjang),
            'lebar' => $request->lebar,
            'tinggi' => $request->tinggi,
            'satuan_barang_id' => $request->satuan_barang_id,
            'desk' => strtoupper($request->desk),
            'image'     => $image->hashName(),
            'harga_modal_usd' => $request->harga_modal_usd,
            'exchange' => $request->exchange,
            'harga_modal_idr' => $request->harga_modal_idr,
            'harga_jual' => $request->harga_jual,
            'stock'   => $request->stock,
            'min_stock'   => $request->min_stock,
            'user_id'   => $request->user_id,
        ]);

        $notification = array(
            'message' => 'Barang Inserted Successfully',
            'alert-type' => 'success'
        );

        //redirect to index
        return redirect()->route('barang')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::with(['user', 'kategoriBarang', 'satuanBarang'])->findOrFail($id);
        // dd($barang);
        return view('master.barang.partials.show', ['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang, $id)
    {
        $barang = Barang::with('user', 'kategoriBarang', 'satuanBarang')->findOrFail($id);
        $satuanBarang = SatuanBarang::where('id', '!=', $barang->satuan_barang_id)->get(['id', 'name']);
        $kategoriBarang = KategoriBarang::where('id', '!=', $barang->kategori_barang_id)->get(['id', 'name']);
        return view('master.barang.partials.edit', ['barang' => $barang, 'satuanBarang' => $satuanBarang, 'kategoriBarang' => $kategoriBarang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validate form
        $this->validate($request, [
            'nama' => 'required|max:50',
            'kategori_barang_id' => 'required',
            'merk' => 'max:50',
            'panjang' => 'numeric',
            'lebar' => 'numeric',
            'tinggi' => 'numeric',
            'satuan_barang_id' => 'required',
            'desk' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:ratio=1/1',
            'harga_modal_usd' => 'required|numeric',
            'exchange' => 'required|numeric',
            'harga_modal_idr' => 'required|numeric',
            'harga_jual' => 'numeric',
            'stock' => 'min:0',
            'min_stock' => 'required|numeric',
            'user_id' => 'required',
        ]);

        //get barang by ID
        $barang = Barang::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            //delete old image
            Storage::delete('public/images/'.$barang->image);

            //update post with new image
            $barang->update([
                'nama' => strtoupper($request->nama),
                'kategori_barang_id' => $request->kategori_barang_id,
                'merk' => strtoupper($request->merk),
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'tinggi' => $request->tinggi,
                'satuan_barang_id' => $request->satuan_barang_id,
                'desk' => strtoupper($request->desk),
                'image'     => $image->hashName(),
                'harga_modal_usd' => $request->harga_modal_usd,
                'exchange' => $request->exchange,
                'harga_modal_idr' => $request->harga_modal_idr,
                'harga_jual' => $request->harga_jual,
                'stock'   => $request->stock,
                'min_stock'   => $request->min_stock,
                'user_id'   => $request->user_id,
            ]);

        } else {

            //update post without image
            $barang->update([
                'nama'     => strtoupper($request->nama),
                'kategori_barang_id' => $request->kategori_barang_id,
                'merk'   => strtoupper($request->merk),
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
                'tinggi' => $request->tinggi,
                'satuan_barang_id' => $request->satuan_barang_id,
                'desk' => strtoupper($request->desk),
                'harga_modal_usd' => $request->harga_modal_usd,
                'exchange' => $request->exchange,
                'harga_modal_idr' => $request->harga_modal_idr,
                'harga_jual' => $request->harga_jual,
                'stock' => $request->stock,
                'min_stock' => $request->min_stock,
                'user_id' => $request->user_id,
            ]);
        }

            $notification = array(
                'message' => 'Data Barang Updated Successfully',
                'alert-type' => 'success'
            );

            //redirect to index
            return redirect()->route('barang')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrfail($id);

        Storage::delete('public/images/'.$barang->image);

        $barang->delete();

        return redirect()->route('barang')->with('message', 'Data Barang Deleted Successfully');
    }
}
