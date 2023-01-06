<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobSheetCreateRequest;
use App\Models\ContainerSizeType;
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
            'typeWeightGross',
            'typeWeightNet',
            'typeMeasurement',
            'typeBillOfLadingHbl',
            'typeBillOfLadingMbl',
        )->orderBy('id', 'desc')->get();
        // dd($jobSheetHead);
        return view('marketing.jobSheet.index', ['jobSheetHeadList' => $jobSheetHead]);
    }

    public function changeStatus($id)
    {
        $getStatus = JobSheet::select('status')->where('id', $id)->first();
        if($getStatus->status == 0) {
            $status = 1;
        }elseif($getStatus->status == 1) {
            $status = 2;
        // }else{
        //     $status = 2;
        }elseif($getStatus->status == 2) {
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
        $type_weight = TypeWeight::select('id', 'code_weight')->get();
        $type_measurement = TypeMeasurement::select('id', 'code_measurement')->get();
        $type_bill_of_lading = TypeBillOfLading::select('id', 'name')->get();
        $type_payment = TypePayment::select('id', 'name')->get();

        return view(
            'marketing.jobSheet.partials.create',
            [
                'kd' => $kd,
                'mandatoryTax' => $mandatory_tax,
                'typeWeight' => $type_weight,
                'typeMeasurement' => $type_measurement,
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
        $fileName = 'si_'.uniqid().'.'.$nm->extension();

        $jobsheet = new JobSheet();
        $jobsheet = JobSheet::create($request->all());

        $jobsheet->booking_no = strtoupper($request->booking_no);
        $jobsheet->name_cons = strtoupper($request->name_cons);
        $jobsheet->address_cons = strtoupper($request->address_cons);
        $jobsheet->email_cons = strtolower($request->email_cons);
        $jobsheet->name_notify = strtoupper($request->name_notify);
        $jobsheet->address_notify = strtoupper($request->address_notify);
        $jobsheet->email_notify = strtolower($request->email_notify);
        $jobsheet->carrier = strtoupper($request->carrier);
        $jobsheet->vessel = strtoupper($request->vessel);
        $jobsheet->pol = strtoupper($request->pol);
        $jobsheet->pod = strtoupper($request->pod);
        $jobsheet->commodity_mbl = strtoupper($request->commodity_mbl);
        $jobsheet->commodity_hbl = strtoupper($request->commodity_hbl);
        $jobsheet->stuffing_address = strtoupper($request->stuffing_address);
        $jobsheet->pic_name = strtoupper($request->pic_name);
        $jobsheet->top = strtoupper($request->top);
        $jobsheet->remarks = strtoupper($request->remarks);
        $jobsheet->si_doc = $fileName;
        $nm->move(public_path().'/si_doc', $fileName);

        $jobsheet->save();


        // dd($request);

        $notification = array(
            'message' => 'Job Sheet Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('jobSheet')->with($notification);
    }

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
