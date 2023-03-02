<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobSheetCreateRequest;
use App\Models\ContainerSizeType;
use App\Models\ContSealDetail;
use App\Models\JobSheet;
use App\Models\MandatoryTax;
use App\Models\Shipper;
use App\Models\TypeBillOfLading;
use App\Models\TypeMeasurement;
use App\Models\TypePackaging;
use App\Models\TypePayment;
use App\Models\TypeWeight;
use App\Models\UndernameHbl;
use App\Models\UndernameMbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class JobSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSheetHead = JobSheet::with(
            'user',
            'shipper',
            'typePayment',
            'typePack',
            'containerSizeType',
            'undernameHbl',
            'mandatoryTaxCons',
            'mandatoryTaxNotify',
            'undernameMbl',
            // 'typeWeightGross',
            // 'typeWeightNet',
            // 'typeMeasurement',
            'typeBillOfLadingHbl',
            'typeBillOfLadingMbl',
        )->orderBy('id', 'desc')->get();
        // dd($jobSheetHead);
        return view('marketing.jobSheet.index', ['jobSheetHeadList' => $jobSheetHead]);
    }

    public function changeStatus($id)
    {
        $getStatus = JobSheet::select('status')->where('id', $id)->first();
        if ($getStatus->status == 0) {
            $status = 1;
        } elseif ($getStatus->status == 1) {
            $status = 2;
            // }else{
            //     $status = 2;
        } elseif ($getStatus->status == 2) {
            $status = 0;
        }

        $notification = array(
            'message' => 'Status Successfully Change',
            'alert-type' => 'success'
        );

        JobSheet::where('id', $id)->update(['status' => $status]);

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $shipper = Shipper::select('id', 'na me', 'address','phone_1', 'phone_2', 'fax', 'email', 'mandatory_tax_id', 'tax_id')->get();
        // dd($shipper);
        $q = DB::table('job_sheet_heads')->select(DB::raw('MAX(RIGHT(code_js,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0007";
        }
        $mandatory_tax = MandatoryTax::select('id', 'name')->get();
        // $type_weight = TypeWeight::select('id', 'code_weight')->get();
        // $type_measurement = TypeMeasurement::select('id', 'code_measurement')->get();
        $type_bill_of_lading = TypeBillOfLading::select('id', 'name')->get();
        $type_payment = TypePayment::select('id', 'name')->get();

        return view(
            'marketing.jobSheet.partials.create',
            [
                'kd' => $kd,
                'mandatoryTax' => $mandatory_tax,
                // 'typeWeight' => $type_weight,
                // 'typeMeasurement' => $type_measurement,
                'typeBillOfLading' => $type_bill_of_lading,
                'typePayment' => $type_payment,
            ]
        );
    }

    public function getShippers($nameShip)
    {
        if (empty($nameShip)) {
            return [];
        }
        $shippers = Shipper::with(['mandatoryTax'])
            ->select('id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'mandatory_tax_id', 'tax_id')
            ->where('name', 'LIKE', "%$nameShip%")
            ->limit(25)
            ->get();

        return $shippers;
    }

    public function getUndernameMbls($nameUndMbl)
    {
        if (empty($nameUndMbl)) {
            return [];
        }
        $undernameMbls = UndernameMbl::with(['mandatoryTax'])
            ->select('id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'mandatory_tax_id', 'tax_id')
            ->where('name', 'LIKE', "%$nameUndMbl%")
            ->limit(25)
            ->get();

        return $undernameMbls;
    }

    public function getUndernameHbls($nameUndHbl)
    {
        if (empty($nameUndHbl)) {
            return [];
        }
        $undernameHbls = UndernameHbl::with(['mandatoryTax'])
            ->select('id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'mandatory_tax_id', 'tax_id')
            ->where('name', 'LIKE', "%$nameUndHbl%")
            ->limit(25)
            ->get();

        return $undernameHbls;
    }

    public function getSizeTypeConts($nameSizeTypeCont)
    {
        if (empty($nameSizeTypeCont)) {
            return [];
        }
        $sizeTypeConts = ContainerSizeType::select('id', 'name')
            ->where('name', 'LIKE', "%$nameSizeTypeCont%")
            ->limit(25)
            ->get();

        return $sizeTypeConts;
    }

    public function getTypePack($nameTypePack)
    {
        if (empty($nameTypePack)) {
            return [];
        }
        $typePacks = TypePackaging::select('id', 'name')
            ->where('name', 'LIKE', "%$nameTypePack%")
            ->limit(25)
            ->get();

        return $typePacks;
    }

    // public function getTypePacks($name)
    // {
    //     if (empty($name)) {
    //         return [];
    //     }
    //     $typePacks = TypeWeight::select('id', 'name')
    //         ->where('name', 'LIKE', "%$name%")
    //         ->limit(25)
    //         ->get();

    //     return $typePacks;
    // }

    public function getTypePackConts(Request $request)
    {
        $name = $request->get('name');
        $fieldName =  $request->get('fieldName');

        $name = trim($name);
        if (empty($fieldName)) {
            $fieldName = 'name';
        }

        $typePackConts = DB::table('type_packagings')
            ->select('id', 'name')
            ->where('name', 'LIKE', "%$name%")
            ->limit(25)
            ->get();

        return $typePackConts;
    }

    // public function getTypeMeasurements(Request $request)
    // {
    //     $name = $request->get('name');
    //     $fieldName =  $request->get('fieldName');

    //     $name = trim($name);
    //     if (empty($fieldName)) {
    //         $fieldName = 'name';
    //     }

    //     $typeMeasurements = DB::table('type_measurements')
    //         ->select('id', 'code_measurement')
    //         ->where('code_measurement', 'LIKE', "%$name%")
    //         ->limit(25)
    //         ->get();

    //     return $typeMeasurements;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(JobSheetCreateRequest $request)
    {

        // dd($request->all());
        $nm = $request->si_doc;
        $fileName = 'si_' . uniqid() . '.' . $nm->extension();

        $jobsheet = new JobSheet();

        $jobsheet->code_js = $request->code_js;
        $jobsheet->booking_no = strtoupper($request->booking_no);
        $jobsheet->shipper_id = $request->shipper_id;
        $jobsheet->undername_mbl_id = $request->undername_mbl_id;
        $jobsheet->undername_hbl_id = $request->undername_hbl_id;
        $jobsheet->name_cons = strtoupper($request->name_cons);
        $jobsheet->address_cons = strtoupper($request->address_cons);
        $jobsheet->phone_1_cons = $request->phone_1_cons;
        $jobsheet->phone_2_cons = $request->phone_2_cons;
        $jobsheet->fax_cons = $request->fax_cons;
        $jobsheet->email_cons = strtolower($request->email_cons);
        $jobsheet->mandatory_tax_id_cons = $request->mandatory_tax_id_cons;
        $jobsheet->tax_id_cons = $request->tax_id_cons;
        $jobsheet->same_as_consignee = $request->same_as_consignee;
        $jobsheet->name_notify = strtoupper($request->name_notify);
        $jobsheet->address_notify = strtoupper($request->address_notify);
        $jobsheet->phone_1_notify = $request->phone_1_notify;
        $jobsheet->phone_2_notify = $request->phone_2_notify;
        $jobsheet->fax_notify = $request->fax_notify;
        $jobsheet->email_notify = strtolower($request->email_notify);
        $jobsheet->mandatory_tax_id_notify = $request->mandatory_tax_id_notify;
        $jobsheet->tax_id_notify = $request->tax_id_notify;
        $jobsheet->carrier = strtoupper($request->carrier);
        $jobsheet->vessel = strtoupper($request->vessel);
        $jobsheet->etd = $request->etd;
        $jobsheet->pol = strtoupper($request->pol);
        $jobsheet->pod = strtoupper($request->pod);
        $jobsheet->open_cy = $request->open_cy;
        $jobsheet->closing_doc = $request->closing_doc;
        $jobsheet->closing_cy = $request->closing_cy;
        $jobsheet->volume = $request->volume;
        $jobsheet->cont_size_type_id = $request->cont_size_type_id;
        $jobsheet->qty = $request->qty;
        $jobsheet->type_packaging_id = $request->type_packaging_id;
        // $jobsheet->cont_seal = $request->cont_seal;
        // $jobsheet->gross_weight = $request->gross_weight;
        // $jobsheet->gross_type = $request->gross_type;
        // $jobsheet->net_weight = $request->net_weight;
        // $jobsheet->net_type = $request->net_type;
        // $jobsheet->measurement = $request->measurement;
        // $jobsheet->type_measurement = $request->type_measurement;
        $jobsheet->commodity_mbl = strtoupper($request->commodity_mbl);
        $jobsheet->hs_code_mbl = $request->hs_code_mbl;
        $jobsheet->mbl_type_bl_id = $request->mbl_type_bl_id;
        $jobsheet->commodity_hbl = strtoupper($request->commodity_hbl);
        $jobsheet->hs_code_hbl = $request->hs_code_hbl;
        $jobsheet->hbl_type_bl_id = $request->hbl_type_bl_id;
        $jobsheet->stuffing_date = $request->stuffing_date;
        $jobsheet->stuffing_address = strtoupper($request->stuffing_address);
        $jobsheet->pic_name = strtoupper($request->pic_name);
        $jobsheet->pic_phone = $request->pic_phone;
        $jobsheet->top = strtoupper($request->top);
        $jobsheet->type_payment_id = $request->type_payment_id;
        $jobsheet->remarks = strtoupper($request->remarks);
        $jobsheet->si_doc = $request->si_doc;
        $jobsheet->status = $request->status;
        $jobsheet->user_id = $request->user_id;
        $jobsheet->si_doc = $fileName;
        $nm->move(public_path() . '/si_doc', $fileName);

        $jobsheet->save();


        // dd($request);

        $notification = array(
            'message' => 'Job Sheet Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('jobSheet')->with($notification);
    }

    // public function simpan_cont_seal(Request $request)
    // {
    //     $cont_seal = $request->cont_seal;
    //     $qty = $request->qty;
    //     // $type_pack = $request->type_pack_id;
    //     $net_weight = $request->net_weight;
    //     $net_type_weight = $request->net_type_weight;
    //     $gross_weight = $request->gross_weight;
    //     $gross_type_weight = $request->gross_type_weight;
    //     $measurement = $request->measurement;
    //     $type_measurement = $request->type_measurement;
    //     // $job_sheet_head_id = $request->job_sheet_head_id;
    //     // dd($request->all());

    //     for ($i = 0; $i < count($cont_seal); $i++) {
    //         $datas = new ContSealDetail();
    //         $datas->qty = $qty[$i];
    //         // $datas->type_pack_id = $type_pack[$i];
    //         $datas->net_weight = $net_weight[$i];
    //         $datas->net_type_weight = $net_type_weight[$i];
    //         $datas->gross_weight = $gross_weight[$i];
    //         $datas->gross_type_weight = $gross_type_weight[$i];
    //         $datas->measurement = $measurement[$i];
    //         $datas->type_measurement = $type_measurement[$i];
    //         // $datas->job_sheet_head_id = $job_sheet_head_id[$i];
    //         $datas->save();
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobSheet  $jobSheet
     * @return \Illuminate\Http\Response
     */
    public function show(JobSheet $jobSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSheet  $jobSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSheet $jobSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobSheet  $jobSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSheet $jobSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobSheet  $jobSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSheet $jobSheet)
    {
        //
    }
}
