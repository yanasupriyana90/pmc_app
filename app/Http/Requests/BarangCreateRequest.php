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
            'sku' => 'required|max:20',
            'nama' => 'required|max:50',
            'merk' => 'max:50',
            'panjang' => 'numeric|max:4',
            'lebar' => 'numeric|max:4',
            'tinggi' => 'numeric|max:4',
            'qty' => 'numeric|max:4',
            'satuan_barang_id' => 'required',
            'desk' => 'max:255',
            'pic' => 'required|mimes:jpeg,png,jpg|size:1024',
            'usd'=> 'required|numeric',
            'exchange_rate' => 'required|numeric',
            'idr' => 'required|numeric',
            'status' => 'required',
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
            'qty' => 'QTY',
            'satuan_barang_id' => 'SATUAN BARANG',
            'desk' => 'DESKRIPSI',
            'pic' => 'PICTURE',
            'usd' => 'USD',
            'exchange_rate' => 'EXCHANGE RATE',
            'idr' => 'IDR',
            'status' => 'STATUS',
            'user_id' => 'USER',
        ];
    }
}
