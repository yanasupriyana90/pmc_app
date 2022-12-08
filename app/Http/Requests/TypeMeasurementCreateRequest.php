<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeMeasurementCreateRequest extends FormRequest
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

            'code_measurement' => 'unique:type_measurements|max:10|required',
            'name' => 'max:50|required',

        ];
    }

    public function attributes()
    {
        return [

            'code_measurement' => 'CODE MEASUREMENT',
            'name' => 'NAME',

        ];
    }
}
