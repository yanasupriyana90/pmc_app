<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_barang' => 'required|unique:barangs|max:10',
            'nama' => 'required|max:50',
            'kategori_barang_id' => 'required',
            'merk' => 'max:50',
            'panjang' => 'numeric',
            'lebar' => 'numeric',
            'tinggi' => 'numeric',
            'satuan_barang_id' => 'required',
            'desk' => 'max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:ratio=1/1',
            'harga_modal_usd' => 'required|numeric',
            'exchange' => 'required|numeric',
            'harga_modal_idr' => 'required|numeric',
            'harga_jual' => 'numeric',
            'stock' => 'numeric|min:0',
            'min_stock' => 'required|numeric',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'kode_barang' => 'KODE BARANG',
            'nama' => 'NAMA',
            'kategori_barang_id' => 'KATEGORI BARANG',
            'merk' => 'MERK',
            'panjang' => 'PANJANG',
            'lebar' => 'LEBAR',
            'tinggi' => 'TINGGI',
            'satuan_barang_id' => 'SATUAN BARANG',
            'desk' => 'DESKRIPSI',
            'image' => 'IMAGE',
            'harga_modal_usd' => 'HARGA MODAL USD',
            'exchange' => 'EXCHANGE RATE',
            'harga_modal_idr' => 'HARGA MODAL IDR',
            'harga_jual' => 'HARGA JUAL',
            'stock' => 'STOCK',
            'min_stock' => 'MIN STOCK',
            'user_id' => 'USER',
        ];
    }
}
