<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSheetCreateRequest extends FormRequest
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
            'booking_no' => 'max:20',
            'shipper_id' => 'required',
            'name_cons' => 'required|max:255',
            'address_cons' => 'required|max:255',
            'phone_1_cons' => 'required|max:20',
            'phone_2_cons' => 'max:20',
            'fax_cons' => 'max:20',
            'email_cons' => 'email:rfc,dns|max:255',
            'mandatory_tax_id_cons' => 'required',
            'tax_id_cons' => 'max:35',
            'name_notify' => 'max:255',
            'address_notify' => 'max:255',
            'phone_1_notify' => 'max:20',
            'phone_2_notify' => 'max:20',
            'fax_notify' => 'max:20',
            'email_notify' => 'max:255',
            'tax_id_notify' => 'max:35',
            'carrier' => 'max:50',
            'vessel' => 'max:50',
            'pol' => 'max:50',
            'pod' => 'max:50',
            'volume' => 'required|max:11',
            'cont_size_type_id' => 'required',
            'qty' => 'required|max:11',
            'type_packaging_id' => 'required',
            'commodity_mbl' => 'required|max:50',
            'hs_code_mbl' => 'max:15',
            'mbl_type_bl_id' => 'required',
            'commodity_hbl' => 'max:50',
            'hs_code_hbl' => 'max:15',
            'stuffing_address' => 'required|max:255',
            'pic_name' => 'required|max:50',
            'pic_phone' => 'required|max:20',
            'top' => 'required|max:30',
            'type_payment_id' => 'required',
            'due_date_inv' => 'required|date',
            'si_doc' => 'required|max:100',
            'status' => 'required',
            'user_id' => 'required',

            'cont_name' => 'max:30',
            'seal_name' => 'max:30',

            'exchange_rate_ros' => 'max:9',
            'exchange_rate_cos' => 'max:9',
            'total_ros' => 'max:13',
            'total_ex_rate_ros' => 'max:13',
            'total_emkl' => 'max:13',
            'total_cos' => 'max:13',
            'total_ex_rate_cos' => 'max:13',
            'total_handling' => 'max:13',
            'grand_total_selling' => 'max:13',
            'grand_total_buying' => 'max:13',
            'profit_loss' => 'max:13',

        ];
    }

    public function attributes()
    {
        return [
            'booking_no' => 'BOOKING NO',
            'shipper_id' => 'SHIPPER',
            'undername_mbl_id' => 'UNDERNAME M-BL/BOOKING',
            'undername_hbl_id' => 'UNDERNAME H-BL/PEB',
            'name_cons' => 'CONSIGNEE',
            'address_cons' => 'ADDRESS CONSIGNEE',
            'phone_1_cons' => 'PHONE 1 CONSIGNEE',
            'phone_2_cons' => 'PHONE 2 CONSIGNEE',
            'fax_cons' => 'FAX CONSIGNEE',
            'email_cons' => 'EMAIL CONSIGNEE',
            'mandatory_tax_id_cons' => 'MANDATORY TAX CONSIGNEE',
            'tax_id_cons' => 'TAX CONSIGNEE',
            'name_notify' => 'NOTIFY PARTY',
            'address_notify' => 'ADDRESS NOTIFY PARTY',
            'phone_1_notify' => 'PHONE 1 NOTIFY PARTY',
            'phone_2_notify' => 'PHONE 2 NOTIFY PARTY',
            'fax_notify' => 'FAX NOTIFY PARTY',
            'email_notify' => 'EMAIL NOTIFY PARTY',
            'mandatory_tax_id_notify ' => 'MANDATORY TAX NOTIFY PARTY',
            'tax_id_notify' => 'TAX NOTIFY PARTY',
            'carrier' => 'CARRIER',
            'vessel' => 'VESSEL',
            'etd' => 'ETD',
            'pol' => 'PORT OF LOADING',
            'pod' => 'PORT OF DISCHARGE',
            'open_cy' => 'OPEN CY',
            'closing_doc' => 'CLOSING DOC',
            'closing_cy' => 'CLOSING CY',
            'volume' => 'VOLUME',
            'cont_size_type_id' => 'CONTAINER TYPE',
            'qty' => 'QTY',
            'type_packaging_id' => 'PACKING TYPE',
            'commodity_mbl' => 'COMMODITY MBL/BOOKING',
            'hs_code_mbl' => 'HS CODE MBL/BOOKING',
            'mbl_type_bl_id' => 'BILL OF LADNG MBL/BOOKING',
            'commodity_hbl' => 'COMMODITY HBL/PEB',
            'hs_code_hbl' => 'HS CODE HBL/PEB',
            'hbl_type_bl_id' => 'BILL OF LADING HBL/PEB',
            'stuffing_date' => 'STUFFING DATE',
            'stuffing_address' => 'STUFFING ADDRESS',
            'pic_name' => 'PIC NAME',
            'pic_phone' => 'PIC PHONE',
            'top' => 'TERM OF PAYMENT',
            'type_payment_id' => 'FREIGHT & CHAREGES',
            'due_date_inv' => 'DUE DATE INVOICE',
            'remarks' => 'REMARKS',
            'si_doc' => 'FILE SI',
            'status' => 'STATUS',
            'user_id' => 'USER ID',

            'cont_name' => 'CONTAINER NO',
            'seal_name' => 'SEAL NO',

            'exchange_rate_ros' => 'EXCHANGE RATE REVENUE OF SALES',
            'exchange_rate_cos' => 'EXCHANGE RATE COST OF SALES',
            'total_ros' => 'TOTAL REVENUE OF SALES',
            'total_ex_rate_ros' => 'TOTAL EXCHANGE RATE REVENUE OF SALES',
            'total_emkl' => 'TOTAL EMKL',
            'total_cos' => 'TOTAL COST OF SALES',
            'total_ex_rate_cos' => 'TOTAL EXCHANGE RATE COST OF SALES',
            'total_handling' => 'TOTAL HANDLING',
            'grand_total_selling' => 'GRAND TOTAL SELLING',
            'grand_total_buying' => 'GRAND TOTAL BUYING',
            'profit_loss' => 'PROFIT-LOSS',
        ];
    }
}
