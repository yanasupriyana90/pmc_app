<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobSheetCreateRequest;
use App\Models\ContainerSizeType;
use App\Models\ContSealDetail;
use App\Models\CostOfSale;
use App\Models\Emkl;
use App\Models\Handling;
use App\Models\JobSheet;
use App\Models\MandatoryTax;
use App\Models\RevenueOfSale;
use App\Models\SellingBuying;
use App\Models\Shipper;
use App\Models\TypeBillOfLading;
use App\Models\TypeMeasurement;
use App\Models\TypePackaging;
use App\Models\TypePayment;
use App\Models\TypeWeight;
use App\Models\UndernameHbl;
use App\Models\UndernameMbl;
use App\Models\User;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test;
use Psy\Command\WhereamiCommand;

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
            'sellingBuying',
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

    public function store(JobSheetCreateRequest $request, Jobsheet $jobSheet)
    {

        // dd($request->all());
        // $nm = $request->si_doc;
        // $fileName = 'si_' . uniqid() . '.' . $nm->extension();

        // $jobsheet = new JobSheet();

        // $jobsheet->code_js = $request->code_js;
        // $jobsheet->booking_no = strtoupper($request->booking_no);
        // $jobsheet->shipper_id = $request->shipper_id;
        // $jobsheet->undername_mbl_id = $request->undername_mbl_id;
        // $jobsheet->undername_hbl_id = $request->undername_hbl_id;
        // $jobsheet->name_cons = strtoupper($request->name_cons);
        // $jobsheet->address_cons = strtoupper($request->address_cons);
        // $jobsheet->phone_1_cons = $request->phone_1_cons;
        // $jobsheet->phone_2_cons = $request->phone_2_cons;
        // $jobsheet->fax_cons = $request->fax_cons;
        // $jobsheet->email_cons = strtolower($request->email_cons);
        // $jobsheet->mandatory_tax_id_cons = $request->mandatory_tax_id_cons;
        // $jobsheet->tax_id_cons = $request->tax_id_cons;
        // $jobsheet->same_as_consignee = $request->same_as_consignee;
        // $jobsheet->name_notify = strtoupper($request->name_notify);
        // $jobsheet->address_notify = strtoupper($request->address_notify);
        // $jobsheet->phone_1_notify = $request->phone_1_notify;
        // $jobsheet->phone_2_notify = $request->phone_2_notify;
        // $jobsheet->fax_notify = $request->fax_notify;
        // $jobsheet->email_notify = strtolower($request->email_notify);
        // $jobsheet->mandatory_tax_id_notify = $request->mandatory_tax_id_notify;
        // $jobsheet->tax_id_notify = $request->tax_id_notify;
        // $jobsheet->carrier = strtoupper($request->carrier);
        // $jobsheet->vessel = strtoupper($request->vessel);
        // $jobsheet->etd = $request->etd;
        // $jobsheet->pol = strtoupper($request->pol);
        // $jobsheet->pod = strtoupper($request->pod);
        // $jobsheet->open_cy = $request->open_cy;
        // $jobsheet->closing_doc = $request->closing_doc;
        // $jobsheet->closing_cy = $request->closing_cy;
        // $jobsheet->volume = $request->volume;
        // $jobsheet->cont_size_type_id = $request->cont_size_type_id;
        // $jobsheet->qty = $request->qty;
        // $jobsheet->type_packaging_id = $request->type_packaging_id;
        // // $jobsheet->cont_seal = $request->cont_seal;
        // // $jobsheet->gross_weight = $request->gross_weight;
        // // $jobsheet->gross_type = $request->gross_type;
        // // $jobsheet->net_weight = $request->net_weight;
        // // $jobsheet->net_type = $request->net_type;
        // // $jobsheet->measurement = $request->measurement;
        // // $jobsheet->type_measurement = $request->type_measurement;
        // $jobsheet->commodity_mbl = strtoupper($request->commodity_mbl);
        // $jobsheet->hs_code_mbl = $request->hs_code_mbl;
        // $jobsheet->mbl_type_bl_id = $request->mbl_type_bl_id;
        // $jobsheet->commodity_hbl = strtoupper($request->commodity_hbl);
        // $jobsheet->hs_code_hbl = $request->hs_code_hbl;
        // $jobsheet->hbl_type_bl_id = $request->hbl_type_bl_id;
        // $jobsheet->stuffing_date = $request->stuffing_date;
        // $jobsheet->stuffing_address = strtoupper($request->stuffing_address);
        // $jobsheet->pic_name = strtoupper($request->pic_name);
        // $jobsheet->pic_phone = $request->pic_phone;
        // $jobsheet->top = strtoupper($request->top);
        // $jobsheet->type_payment_id = $request->type_payment_id;
        // $jobsheet->remarks = strtoupper($request->remarks);
        // $jobsheet->si_doc = $request->si_doc;
        // $jobsheet->status = $request->status;
        // $jobsheet->user_id = $request->user_id;
        // $jobsheet->si_doc = $fileName;
        // $nm->move(public_path() . '/si_doc', $fileName);
        // // dd($jobsheet);

        // $jobsheet->save();

        $data = $request->all();
        // dd($data);
        $nm = $data['si_doc'];
        $fileName = 'si_' . uniqid() . '.' . $nm->extension();

        $jobsheet = new JobSheet;
        $jobsheet->code_js = $data['code_js'];
        $jobsheet->sales_name = $data['sales_name'];
        $jobsheet->booking_no = strtoupper($data['booking_no']);
        $jobsheet->shipper_id = $data['shipper_id'];
        $jobsheet->use_und_hbl = $data['use_und_hbl_input'];
        if($jobsheet->use_und_hbl_input == 0) {
            $jobsheet->undername_hbl_id = null;
        }else{
            $jobsheet->undername_hbl_id = $data['undername_hbl_id'];
        }
        $jobsheet->name_cons = strtoupper($data['name_cons']);
        $jobsheet->address_cons = strtoupper($data['address_cons']);
        $jobsheet->phone_1_cons = $data['phone_1_cons'];
        $jobsheet->phone_2_cons = $data['phone_2_cons'];
        $jobsheet->fax_cons = $data['fax_cons'];
        $jobsheet->email_cons = strtolower($data['email_cons']);
        $jobsheet->mandatory_tax_id_cons = $data['mandatory_tax_id_cons'];
        $jobsheet->tax_id_cons = $data['tax_id_cons'];
        $jobsheet->same_as_consignee = $data['same_as_consignee_input'];
        if($jobsheet->same_as_consignee_input == 0) {
            $jobsheet->name_notify = strtoupper($data['name_notify']);
            $jobsheet->address_notify = strtoupper($data['address_notify']);
            $jobsheet->phone_1_notify = $data['phone_1_notify'];
            $jobsheet->phone_2_notify = $data['phone_2_notify'];
            $jobsheet->fax_notify = $data['fax_notify'];
            $jobsheet->email_notify = strtolower($data['email_notify']);
            $jobsheet->mandatory_tax_id_notify = $data['mandatory_tax_id_notify'];
            $jobsheet->tax_id_notify = $data['tax_id_notify'];
        }else{
            $jobsheet->name_notify = null;
            $jobsheet->address_notify = null;
            $jobsheet->phone_1_notify = null;
            $jobsheet->phone_2_notify = null;
            $jobsheet->fax_notify = null;
            $jobsheet->email_notify = null;
            $jobsheet->mandatory_tax_id_notify = null;
            $jobsheet->tax_id_notify = null;
        }
        $jobsheet->carrier = strtoupper($data['carrier']);
        $jobsheet->vessel = strtoupper($data['vessel']);
        $jobsheet->etd = $data['etd'];
        $jobsheet->pol = strtoupper($data['pol']);
        $jobsheet->pod = strtoupper($data['pod']);
        $jobsheet->open_cy = $data['open_cy'];
        $jobsheet->closing_doc = $data['closing_doc'];
        $jobsheet->closing_cy = $data['closing_cy'];
        $jobsheet->volume = $data['volume'];
        $jobsheet->cont_size_type_id = $data['cont_size_type_id'];
        $jobsheet->qty = $data['qty'];
        $jobsheet->type_packaging_id = $data['type_packaging_id'];
        // $jobsheet->cont_seal = $data['cont_seal'];
        // $jobsheet->gross_weight = $data['gross_weight'];
        // $jobsheet->gross_type = $data['gross_type'];
        // $jobsheet->net_weight = $data['net_weight'];
        // $jobsheet->net_type = $data['net_type'];
        // $jobsheet->measurement = $data['measurement'];
        // $jobsheet->type_measurement = $data['type_measurement'];
        $jobsheet->commodity_mbl = strtoupper($data['commodity_mbl']);
        $jobsheet->hs_code_mbl = $data['hs_code_mbl'];
        $jobsheet->mbl_type_bl_id = $data['mbl_type_bl_id'];
        $jobsheet->use_commodity_hbl = $data['use_commodity_hbl_input'];
        if($jobsheet->use_commodity_hbl_input == 0) {
            $jobsheet->commodity_hbl = null;
            $jobsheet->hs_code_hbl = null;
            $jobsheet->hbl_type_bl_id = null;
        }else{
            $jobsheet->commodity_hbl = strtoupper($data['commodity_hbl']);
            $jobsheet->hs_code_hbl = $data['hs_code_hbl'];
            $jobsheet->hbl_type_bl_id = $data['hbl_type_bl_id'];
        }
        $jobsheet->stuffing_date = $data['stuffing_date'];
        $jobsheet->stuffing_address = strtoupper($data['stuffing_address']);
        $jobsheet->pic_name = strtoupper($data['pic_name']);
        $jobsheet->pic_phone = $data['pic_phone'];
        $jobsheet->top = strtoupper($data['top']);
        $jobsheet->type_payment_id = $data['type_payment_id'];
        $jobsheet->due_date_inv = $data['due_date_inv'];
        $jobsheet->remarks = strtoupper($data['remarks']);
        $jobsheet->si_doc = $data['si_doc'];
        $jobsheet->status = $data['status'];
        $jobsheet->user_id = $data['user_id'];
        $jobsheet->si_doc = $fileName;
        $nm->move(public_path() . '/si_doc', $fileName);
        $jobsheet->save();

        if (count($data['contName']) > 0) {
            foreach ($data['contName'] as $item => $value) {
                $dataContName = array(
                    'job_sheet_head_id' => $jobsheet -> id,
                    'cont_name' => strtoupper($data['contName'][$item]),
                    'seal_name' => strtoupper($data['sealName'][$item]),
                );
                ContSealDetail::create($dataContName);
            }
        }

        $sellingBuying = new SellingBuying;
        $sellingBuying->job_sheet_head_id = $jobsheet->id;
        $sellingBuying->exchange_rate_ros = $data['exchangeRateRos'];
        $sellingBuying->exchange_rate_cos = $data['exchangeRateCos'];
        $sellingBuying->total_ros = $data['finalTotalAmountRos'];
        $sellingBuying->total_ex_rate_ros = $data['finalTotalAmountExRateRos'];
        $sellingBuying->total_emkl = $data['finalTotalAmountEmkl'];
        $sellingBuying->total_cos = $data['finalTotalAmountCos'];
        $sellingBuying->total_ex_rate_cos = $data['finalTotalAmountExRateCos'];
        $sellingBuying->total_handling = $data['finalTotalAmountHand'];
        $sellingBuying->grand_total_selling = $data['grandTotalSelling'];
        $sellingBuying->grand_total_buying = $data['grandTotalBuying'];
        $sellingBuying->profit_loss = $data['profitLoss'];
        $sellingBuying->save();

        if (count($data['itemNameRos']) > 0) {
            foreach ($data['itemNameRos'] as $item => $value) {
                $dataRos = array(
                    'selling_buying_id' => $sellingBuying -> id,
                    'item_name' => strtoupper($data['itemNameRos'][$item]),
                    'volume' => $data['volRos'][$item],
                    'price' => $data['priceRos'][$item],
                    'actual_amt' => $data['actualAmountRos'][$item],
                    'tax_rate' => $data['taxRateRos'][$item],
                    'tax_amt' => $data['taxAmountRos'][$item],
                    'final_amount' => $data['itemFinalAmountRos'][$item],
                );
                RevenueOfSale::create($dataRos);
            }
        }

        if (count($data['itemNameEmkl']) > 0) {
            foreach ($data['itemNameEmkl'] as $item => $value) {
                $dataEmkl = array(
                    'selling_buying_id' => $sellingBuying -> id,
                    'item_name' => strtoupper($data['itemNameEmkl'][$item]),
                    'volume' => $data['volEmkl'][$item],
                    'actual_amt' => $data['actualAmountEmkl'][$item],
                    'price' => $data['priceEmkl'][$item],
                    'tax_rate' => $data['taxRateEmkl'][$item],
                    'tax_amt' => $data['taxAmountEmkl'][$item],
                    'final_amount' => $data['itemFinalAmountEmkl'][$item],
                );
                Emkl::create($dataEmkl);
            }
        }

        if (count($data['itemNameCos']) > 0) {
            foreach ($data['itemNameCos'] as $item => $value) {
                $dataCos = array(
                    'selling_buying_id' => $sellingBuying -> id,
                    'item_name' => strtoupper($data['itemNameCos'][$item]),
                    'volume' => $data['volCos'][$item],
                    'price' => $data['priceCos'][$item],
                    'actual_amt' => $data['actualAmountCos'][$item],
                    'tax_rate' => $data['taxRateCos'][$item],
                    'tax_amt' => $data['taxAmountCos'][$item],
                    'final_amount' => $data['itemFinalAmountCos'][$item],
                );
                CostOfSale::create($dataCos);
            }
        }

        if (count($data['itemNameHand']) > 0) {
            foreach ($data['itemNameHand'] as $item => $value) {
                $dataHand = array(
                    'selling_buying_id' => $sellingBuying -> id,
                    'item_name' => strtoupper($data['itemNameHand'][$item]),
                    'volume' => $data['volHand'][$item],
                    'price' => $data['priceHand'][$item],
                    'actual_amt' => $data['actualAmountHand'][$item],
                    'tax_rate' => $data['taxRateHand'][$item],
                    'tax_amt' => $data['taxAmountHand'][$item],
                    'final_amount' => $data['itemFinalAmountHand'][$item],
                );
                Handling::create($dataHand);
            }
        }

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
    public function show($id)
    {
        $jobSheetHead = JobSheet::with(
            ['user',
            'shipper',
            'undernameMbl',
            'undernameHbl',
            'mandatoryTaxCons',
            'mandatoryTaxNotify',
            'containerSizeType',
            'typePack',
            'contSealDetail',
            'typeBillOfLadingMbl',
            'typeBillOfLadingHbl',
            'typePayment',
            'sellingBuying',
            'sellingBuying.ros',
            'sellingBuying.emkl',
            'sellingBuying.cos',
            'sellingBuying.handling',
            ])->findorFail($id);

        // $jobSheetHead = DB::table('job_sheet_heads')
        //                     ->join('selling_buyings', 'selling_buyings.job_sheet_head_id', '=', 'job_sheet_heads.id')
        //                     ->join('revenue_of_sales', 'revenue_of_sales.selling_buying_id', '=', 'selling_buyings.id')
        //                     ->join('emkls', 'emkls.selling_buying_id', '=', 'selling_buyings.id')
        //                     ->join('cost_of_sales', 'cost_of_sales.selling_buying_id', '=', 'selling_buyings.id')
        //                     ->join('handlings', 'handlings.selling_buying_id', '=', 'selling_buyings.id')
        //                     ->where('job_sheet_heads.id', $id )
        //                     ->get();

        // $jobSheetHead = JobSheet::join('selling_buyings', 'selling_buyings.job_sheet_head_id', '=', 'job_sheet_heads.id')
        //                         ->join('revenue_of_sales', 'revenue_of_sales.selling_buying_id', '=', 'selling_buyings.id')
        //                         ->join('emkls', 'emkls.selling_buying_id', '=', 'selling_buyings.id')
        //                         ->join('cost_of_sales', 'cost_of_sales.selling_buying_id', '=', 'selling_buyings.id')
        //                         ->join('handlings', 'handlings.selling_buying_id', '=', 'selling_buyings.id')
        //                         ->where('job_sheet_heads.id', $id )
        //                         ->get();

        // dd($jobSheetHead);
        // dd($jobSheetHead->undername_mbl_id);
        return view('marketing.jobSheet.partials.show', ['jobSheetHeadList' => $jobSheetHead]);
        // return view('marketing.jobSheet.partials.show', compact('jobSheetHead'));

        // $undernameHbl = UndernameHbl::with(['user', 'mandatoryTax'])->findOrFail($id);
    }

    // public function sellingBuyingCreate($id)
    // {
    //     $jobSheetHead = JobSheet::with(['shipper', 'undernameMbl', 'undernameHbl', 'containerSizeType', 'typePayment'])->findorFail($id);
    //     return view('marketing.sellingBuying.partials.create', ['jobSheetHeadList' => $jobSheetHead]);
    //     // dd($jobSheetHead);
    // }

    // public function sellingBuyingStore(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data);
    //     $sellingBuying = new SellingBuying;
    //     $sellingBuying->job_sheet_head_id = $data['jobSheetHeadId'];
    //     $sellingBuying->exchange_rate_ros = $data['exchangeRateRos'];
    //     $sellingBuying->exchange_rate_cos = $data['exchangeRateCos'];
    //     $sellingBuying->total_ros = $data['finalTotalAmountRos'];
    //     $sellingBuying->total_ex_rate_ros = $data['finalTotalAmountExRateRos'];
    //     $sellingBuying->total_emkl = $data['finalTotalAmountEmkl'];
    //     $sellingBuying->total_cos = $data['finalTotalAmountCos'];
    //     $sellingBuying->total_ex_rate_cos = $data['finalTotalAmountExRateCos'];
    //     $sellingBuying->total_handling = $data['finalTotalAmountHand'];
    //     $sellingBuying->grand_total_selling = $data['grandTotalSelling'];
    //     $sellingBuying->grand_total_buying = $data['grandTotalBuying'];
    //     $sellingBuying->profit_loss = $data['profitLoss'];
    //     $sellingBuying->remark = strtoupper($data['remarks']);
    //     $sellingBuying->user_id = $data['userId'];
    //     $sellingBuying->save();

    //     // $ros = new RevenueOfSale;
    //     // $ros->category = $data['categoryRos'];
    //     // $ros->volume = $data['qty'];
    //     // $ros->unit_cost = $data['unit_cost'];
    //     // $ros->amount = $data['amount'];
    //     // $ros->remarks = $data['remarksRos'];
    //     // $ros->selling_buying_id = $sellingBuying['id'];
    //     // $ros->user_id = $sellingBuying['user_id'];
    //     // $ros->save();

    //     if (count($data['itemNameRos']) > 0) {
    //         foreach ($data['itemNameRos'] as $item => $value) {
    //             $dataRos = array(
    //                 'selling_buying_id' => $sellingBuying -> id,
    //                 'item_name' => strtoupper($data['itemNameRos'][$item]),
    //                 'volume' => $data['volRos'][$item],
    //                 'price' => $data['priceRos'][$item],
    //                 'actual_amt' => $data['actualAmountRos'][$item],
    //                 'tax_rate' => $data['taxRateRos'][$item],
    //                 'tax_amt' => $data['taxAmountRos'][$item],
    //                 'final_amount' => $data['itemFinalAmountRos'][$item],
    //                 'user_id' => $sellingBuying -> user_id,
    //             );
    //             RevenueOfSale::create($dataRos);
    //         }
    //     }

    //     if (count($data['itemNameEmkl']) > 0) {
    //         foreach ($data['itemNameEmkl'] as $item => $value) {
    //             $dataEmkl = array(
    //                 'selling_buying_id' => $sellingBuying -> id,
    //                 'item_name' => strtoupper($data['itemNameEmkl'][$item]),
    //                 'volume' => $data['volEmkl'][$item],
    //                 'actual_amt' => $data['actualAmountEmkl'][$item],
    //                 'price' => $data['priceEmkl'][$item],
    //                 'tax_rate' => $data['taxRateEmkl'][$item],
    //                 'tax_amt' => $data['taxAmountEmkl'][$item],
    //                 'final_amount' => $data['itemFinalAmountEmkl'][$item],
    //                 'user_id' => $sellingBuying -> user_id,
    //             );
    //             Emkl::create($dataEmkl);
    //         }
    //     }

    //     if (count($data['itemNameCos']) > 0) {
    //         foreach ($data['itemNameCos'] as $item => $value) {
    //             $dataCos = array(
    //                 'selling_buying_id' => $sellingBuying -> id,
    //                 'item_name' => strtoupper($data['itemNameCos'][$item]),
    //                 'volume' => $data['volCos'][$item],
    //                 'price' => $data['priceCos'][$item],
    //                 'actual_amt' => $data['actualAmountCos'][$item],
    //                 'tax_rate' => $data['taxRateCos'][$item],
    //                 'tax_amt' => $data['taxAmountCos'][$item],
    //                 'final_amount' => $data['itemFinalAmountCos'][$item],
    //                 'user_id' => $sellingBuying -> user_id,
    //             );
    //             CostOfSale::create($dataCos);
    //         }
    //     }

    //     if (count($data['itemNameHand']) > 0) {
    //         foreach ($data['itemNameHand'] as $item => $value) {
    //             $dataHand = array(
    //                 'selling_buying_id' => $sellingBuying -> id,
    //                 'item_name' => strtoupper($data['itemNameHand'][$item]),
    //                 'volume' => $data['volHand'][$item],
    //                 'price' => $data['priceHand'][$item],
    //                 'actual_amt' => $data['actualAmountHand'][$item],
    //                 'tax_rate' => $data['taxRateHand'][$item],
    //                 'tax_amt' => $data['taxAmountHand'][$item],
    //                 'final_amount' => $data['itemFinalAmountHand'][$item],
    //                 'user_id' => $sellingBuying -> user_id,
    //             );
    //             Handling::create($dataHand);
    //         }
    //     }

    //     $notification = array(
    //         'message' => 'Selling & Buying Inserted Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('jobSheet')->with($notification);

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobSheet  $jobSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSheet $jobSheet, $id)
    {
        $jobSheet = JobSheet::with([
            'user',
            'shipper',
            'undernameMbl',
            'undernameHbl',
            // 'mandatoryTaxCons',
            // 'mandatoryTaxNotify',
            'containerSizeType',
            'typePack',
            'contSealDetail',
            'typeBillOfLadingMbl',
            // 'typeBillOfLadingHbl',
            // 'typePayment',
            // 'sellingBuying',
            // 'sellingBuying.ros',
            // 'sellingBuying.emkl',
            // 'sellingBuying.cos',
            // 'sellingBuying.handling',
        ])->findOrfail($id);
        // dd($jobSheet);
        $user = User::where('id', '!=', $jobSheet->user_id)->get(['id', 'name']);
        $shipper = Shipper::where('id', '!=', $jobSheet->shipper_id)->get(['id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'tax_id']);
        $undernameMbl = UndernameMbl::where('id', '!=', $jobSheet->undername_mbl_id)->get(['id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'tax_id']);
        $undernameHbl = UndernameHbl::where('id', '!=', $jobSheet->undername_hbl_id)->get(['id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'tax_id']);
        $containerSizeType = ContainerSizeType::where('id', '!=', $jobSheet->cont_size_type_id)->get(['id', 'name']);
        $typePack = TypePackaging::where('id', '!=', $jobSheet->type_pack_id)->get(['id', 'name']);
        $contSealDetail = ContSealDetail::where('job_sheet_head_id', '!=', $jobSheet->id)->get(['id', 'cont_name', 'seal_name']);
        $typeBillOfLadingMbl = TypeBillOfLading::where('id', '!=', $jobSheet->mbl_type_bl_id)->get(['id', 'name']);
        return view('marketing.jobSheet.partials.edit', [
            'jobSheet' => $jobSheet,
            'user' => $user,
            'shipper' => $shipper,
            'undernameMbl' => $undernameMbl,
            'undernameHbl' => $undernameHbl,
            'containerSizeType' => $containerSizeType,
            'typePack' => $typePack,
            'contSealDetail' => $contSealDetail,
            'typeBillOfLadingMbl' => $typeBillOfLadingMbl,
        ]);
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

    public function printPDF($id)
    {
        $jobSheetHead = JobSheet::with(
            ['user',
            'shipper',
            'undernameMbl',
            'undernameHbl',
            'mandatoryTaxCons',
            'mandatoryTaxNotify',
            'containerSizeType',
            'typePack',
            'contSealDetail',
            'typeBillOfLadingMbl',
            'typeBillOfLadingHbl',
            'typePayment',
            'sellingBuying',
            'sellingBuying.ros',
            'sellingBuying.emkl',
            'sellingBuying.cos',
            'sellingBuying.handling',
            ])->findorFail($id);
        return view('marketing.jobSheet.partials.printPDF', ['jobSheetHeadList' => $jobSheetHead]);

    }


}
