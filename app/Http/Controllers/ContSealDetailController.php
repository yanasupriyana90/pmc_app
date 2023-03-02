<?php

namespace App\Http\Controllers;

use App\Models\ContSealDetail;
use Illuminate\Http\Request;

class ContSealDetailController extends Controller
{
    public function simpan_cont_seal(Request $request)
    {
        $cont_seal = $request->cont_seal;
        $qty = $request->qty;
        // $type_pack = $request->type_pack_id;
        $net_weight = $request->net_weight;
        $net_type_weight = $request->net_type_weight;
        $gross_weight = $request->gross_weight;
        $gross_type_weight = $request->gross_type_weight;
        $measurement = $request->measurement;
        $type_measurement = $request->type_measurement;
        // $job_sheet_head_id = $request->job_sheet_head_id;
        // dd($request->all());

        for ($i = 0; $i < count($cont_seal); $i++) {
            $datas = new ContSealDetail();
            $datas->qty = $qty[$i];
            // $datas->type_pack_id = $type_pack[$i];
            $datas->net_weight = $net_weight[$i];
            $datas->net_type_weight = $net_type_weight[$i];
            $datas->gross_weight = $gross_weight[$i];
            $datas->gross_type_weight = $gross_type_weight[$i];
            $datas->measurement = $measurement[$i];
            $datas->type_measurement = $type_measurement[$i];
            // $datas->job_sheet_head_id = $job_sheet_head_id[$i];
            $datas->save();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\ContSealDetail  $contSealDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ContSealDetail $contSealDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContSealDetail  $contSealDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ContSealDetail $contSealDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContSealDetail  $contSealDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContSealDetail $contSealDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContSealDetail  $contSealDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContSealDetail $contSealDetail)
    {
        //
    }
}
