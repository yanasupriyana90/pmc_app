<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeBillOfLadingCreateRequest extends FormRequest
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

            'name' => 'unique:type_bill_of_ladings|max:100|required',

        ];
    }

    public function attributes()
    {
        return [

            'name' => 'NAME',

        ];
    }
}
