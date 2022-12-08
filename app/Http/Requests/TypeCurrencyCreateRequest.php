<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeCurrencyCreateRequest extends FormRequest
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

            'code_currency' => 'unique:type_currencies|max:10|required',
            'name' => 'max:50|required',

        ];
    }

    public function attributes()
    {
        return [

            'code_currency' => 'CODE CURRENCY',
            'name' => 'NAME',

        ];
    }
}
