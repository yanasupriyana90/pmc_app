<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangKeluarCreateRequest extends FormRequest
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
            'vendor_id' => 'required',
            'tanggal_pembelian' => 'required',
            'nomor_invoice' => 'required',
            'total_harga' => 'numeric|required',
            'user_id' => 'required',
        ];
    }
}
