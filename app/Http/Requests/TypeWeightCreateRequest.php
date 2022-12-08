<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeWeightCreateRequest extends FormRequest
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

            'code_weight' => 'unique:type_weights|max:20|required',
            'name' => 'max:50|required',

        ];
    }

    public function attributes()
    {
        return [

            'code_weight' => 'CODE WEIGHT',
            'name' => 'NAME',

        ];
    }
}
