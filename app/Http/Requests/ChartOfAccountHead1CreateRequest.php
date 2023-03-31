<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartOfAccountHead1CreateRequest extends FormRequest
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
        $rules = [
            'code' => 'required|numeric|max:5',
            'desc' => 'required|max:255'
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'code' => 'CODE COA',
            'desc' => 'DESCRIPTION'
        ];
    }
}
