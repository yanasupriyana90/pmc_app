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
        $sellingBuying = SellingBuying::with('user', 'jobSheetHead')->get();
        dd($sellingBuying);
        return view('marketing.sellingBuying.partials.index');
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
