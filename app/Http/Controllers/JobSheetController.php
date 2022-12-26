<?php

namespace App\Http\Controllers;

use App\Models\JobSheet;
use App\Models\Shipper;
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
        return view('marketing.jobSheet.index');
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
        $q = DB::table('job_sheet_heads')->select(DB::raw('MAX(RIGHT(code_job_sheet,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        // return view('marketing.jobSheet.partials.create', ['jobSheet' => $shipper], ['kd' => $kd]);
        return view('marketing.jobSheet.partials.create', ['kd' => $kd]);
    }

    public function getShippers($name)
    {
        if (empty($name)) {
            return [];
        }
        $shippers = Shipper::with(['mandatoryTax'])
            ->select('id', 'name', 'address', 'phone_1', 'phone_2', 'fax', 'email', 'mandatory_tax_id', 'tax_id')
            ->where('name', 'LIKE', "%$name%")
            ->limit(25)
            ->get();

        return $shippers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
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
