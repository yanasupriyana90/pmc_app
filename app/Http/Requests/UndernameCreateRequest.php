<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UndernameCreateRequest extends FormRequest
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

            'code_undername' => 'required|unique:undernames|max:3',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'phone_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fax' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'required|email:rfc,dns|max:255',
            'mandatory_tax_id' => 'required',
            'tax_id' => 'nullable|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:35',

        ];

        if ($this->getMethod() == "PUT") {
            $rules = [

                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'phone_1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'phone_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
                'fax' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email' => 'required|email:rfc,dns|max:255',
                'mandatory_tax_id' => 'required',
                'tax_id' => 'nullable|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:35',

            ];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'code_undername' => 'CODE UNDERNAME',
            'name' => 'NAME',
            'address' => 'ADDRESS',
            'phone_1' => 'PHONE 1',
            'phone_2' => 'PHONE 2',
            'fax' => 'FAX',
            'email' => 'EMAIL ADDRESS',
            'mandatory_tax_id' => 'MANDATORY TAX',
            'tax_id' => 'TAX ID',
        ];
    }
}
