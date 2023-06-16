<?php

namespace App\Http\Controllers;

use App\Models\JobSheet;
use App\Models\RevenueOfSale;
use App\Models\SellingBuying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SellingBuyingController extends Controller
{
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

    public function createRosSaveRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $sellingBuying = new RevenueOfSale;
            $sellingBuying->job_sheet_head_id = $request->job_sheet_id;
            $sellingBuying->exchange_rate = $request->exchange_rate;
            $sellingBuying->user_id = $request->user_id;
            $sellingBuying->save();

            foreach($request->category as $key => $categories)
            {
                $ros['category'] = $categories;
                $ros['volume'] = $request->volume[$key];
                $ros['unit_cost'] = $request->unit_cost[$key];
                $ros['amount'] = $request->amount[$key];
                $ros['remarks'] = $request->remarks[$key];
                $ros['selling_buying_id'] = $request->selling_buying_id[$key];
                $ros['user_id'] = $request->user_id[$key];

                RevenueOfSale::create($ros);
            }
            DB::commit();
        } catch(\Exception) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellingBuying  $sellingBuying
     * @return \Illuminate\Http\Response
     */
    public function show(SellingBuying $sellingBuying)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellingBuying  $sellingBuying
     * @return \Illuminate\Http\Response
     */
    public function edit(SellingBuying $sellingBuying)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellingBuying  $sellingBuying
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellingBuying $sellingBuying)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellingBuying  $sellingBuying
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellingBuying $sellingBuying)
    {
        //
    }
}
