<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountCreateRequest extends FormRequest
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
            'name_bank' => 'required|max:20',
            'no_account' => 'required|max:20',
            'name_account' => 'required|max:50',
            'saldo' => 'required|numeric',
        ];

        // if ($this->getMethod() == "PUT") {
        //     $rules = [

        //     ];
        // }
        return $rules;
    }

    public function attributes()
    {
        return [
            'name_bank' => 'BANK NAME',
            'no_account' => 'ACCOUNT NO',
            'name_account' => 'ACCOUNT NAME',
            'saldo' => 'SALDO',
        ];
    }
}
