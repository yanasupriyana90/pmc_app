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
            'sku' => 'required|unique:barangs|max:20',
            'nama' => 'required|max:50',
            'merk' => 'max:50',
            'panjang' => 'numeric',
            'lebar' => 'numeric',
            'tinggi' => 'numeric',
            'satuan_barang_id' => 'required',
            'desk' => 'max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024|dimensions:ratio=1/1',
            'usd' => 'required|numeric|min:0.1',
            'stock' => 'required|numeric|min:0',
            'min_stock' => 'required|numeric',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'sku' => 'SKU',
            'nama' => 'NAMA',
            'merk' => 'MERK',
            'panjang' => 'PANJANG',
            'lebar' => 'LEBAR',
            'tinggi' => 'TINGGI',
            'satuan_barang_id' => 'SATUAN BARANG',
            'desk' => 'DESKRIPSI',
            'image' => 'IMAGE',
            'usd' => 'USD',
            'stock' => 'STOCK',
            'min_stock' => 'MIN STOCK',
            'user_id' => 'USER',
        ];
    }
}
