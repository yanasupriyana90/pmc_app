<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashInBankCreateRequest extends FormRequest
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
            'no_trans' => 'required|max:20',
            'date_trans' => 'required|date',
            'desc' => 'required|max:255',
            // 'debit' => 'numeric',
            // 'credit' => 'numeric',
            'bank_account_id' => 'required',
            'remarks' => 'required|max:255',
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
            'no_trans' => 'NO TRANSACTION',
            'date_trans' => 'DATE TRANSACTION',
            'desc' => 'DESCRIPTION',
            'debit' => 'DEBIT',
            'credit' => 'CREDIT',
            'bank_account_id' => 'BANK ACCOUNT',
            'remarks' => 'REMARKS',
            'trans_doc' => 'TRANSACTION DOCUMENT',
        ];
    }
}
