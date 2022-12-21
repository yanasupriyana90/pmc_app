<?php

namespace App\Http\Controllers;

use App\Models\JobSheet;
use Illuminate\Http\Request;

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
        return view('marketing.jobSheet.partials.create');
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
