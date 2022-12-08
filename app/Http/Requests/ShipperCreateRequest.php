<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipperCreateRequest extends FormRequest
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

            'code_shipper' => 'unique:shippers|max:3|required',
            'name' => 'max:255|required',
            'address' => 'max:255|required',
            'phone_1' => 'max:20|required',
            'phone_2' => 'max:20',
            'fax' => 'max:20',
            'email' => 'email:rfc,dns|max:255',
            'npwp' => 'max:25',

        ];
    }

    public function attributes()
    {
        return [
            'code_shipper' => 'CODE SHIPPER',
            'name' => 'NAME',
            'address' => 'ADDRESS',
            'phone_1' => 'PHONE 1',
            'phone_2' => 'PHONE 2',
            'fax' => 'FAX',
            'email' => 'EMAIL ADDRESS',
            'npwp' => 'NPWP',
        ];
    }
}
