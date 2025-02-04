<?php

namespace App\Http\Requests;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class VendorCreateRequest extends FormRequest
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
            'initial_code' => 'required|unique:vendors|min:2|max:4',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'pic_name' => 'required|max:255',
            'phone_1' => 'required|unique:vendors|regex:/^([0-9\s\-\+\(\)]*)$/|max:20',
            'phone_2' => 'nullable|unique:vendors|regex:/^([0-9\s\-\+\(\)]*)$/|max:20',
            'email' => 'email:rfc,dns|max:255',
            'mandatory_tax_id' => 'required',
            'tax_id'=> 'nullable|unique:vendors|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:35',
        ];

        if ($this->getMethod() == "PUT") {
            $rules = [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'pic_name' => 'required|max:255',
                'phone_1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:20',
                'phone_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:20',
                'email' => 'email:rfc|max:255',
                'mandatory_tax_id' => 'required',
                'tax_id' => 'nullable|regex:/^([0-9\.\s\-\+\(\)]*)$/|max:35',
            ];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'initial_code' => 'INITIAL CODE',
            'name' => 'NAME',
            'address' => 'ADDRESS',
            'pic_name' => 'PIC NAME',
            'phone_1' => 'PHONE 1',
            'phone_2' => 'PHONE 2',
            'email' => 'EMAIL ADDRESS',
            'mandatory_tax_id' => 'MANDATORY TAX',
            'tax_id' => 'TAX ID',
        ];
    }
}
