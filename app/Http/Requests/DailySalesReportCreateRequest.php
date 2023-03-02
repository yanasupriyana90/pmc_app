<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailySalesReportCreateRequest extends FormRequest
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
            'code_daily_sales_report' => 'required|max:12',
            'date_report' => 'required',
            'shipper' => 'required|max:255',
            'address' => 'required|max:255',
            'pic_name' => 'nullable|max:50',
            'phone_1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'phone_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            'fax' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email' => 'nullable|email:rfc,dns|max:255',
            'commodity' => 'nullable|max:255',
            'destination' => 'nullable|max:255',
            'remarks' => 'nullable',
            'status' => 'required',
        ];

        if ($this->getMethod() == "PUT") {
            $rules = [
                'code_daily_sales_report' => 'required|max:12',
                'date_report' => 'required',
                'shipper' => 'required|max:255',
                'address' => 'required|max:255',
                'pic_name' => 'required|max:50',
                'phone_1' => 'required|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
                'phone_2' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
                'fax' => 'nullable|max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
                'email' => 'nullable|email:rfc,dns|max:255',
                'commodity' => 'required|max:255',
                'destination' => 'required|max:255',
                'remarks' => 'required',
                'status' => 'required',
            ];
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            'date_report' => 'DATE REPORT',
            'shipper' => 'SHIPPER',
            'address' => 'ADDRESS',
            'pic_name' => 'PIC NAME',
            'phone_1' => 'PHONE 1',
            'phone_2' => 'PHONE 2',
            'fax' => 'FAX',
            'email' => 'EMAIL',
            'commodity' => 'COMMODITY',
            'destination' => 'DESTINATION',
            'remarks' => 'REMARKS',
            'status' => 'STATUS',
        ];
    }
}
