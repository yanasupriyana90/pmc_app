<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailySalesReportCreateRequest;
use App\Models\DailySalesReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailySalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dailySalesReport = DailySalesReport::with('user')->distinct(['code_daily_sales_report'])->orderBy('id', 'desc')->get();
        // $dailySalesReport = DB::table('daily_sales_reports')
        //     ->join('daily_sales_reports', 'user_id', '=', 'users.id')
        //     ->select('daily_sales_reports.*', 'users.name')
        //     ->distinct('daily_sales_reports.code_daily_sales_report')
        //     ->get();
        $dailySalesReport = DailySalesReport::with('user')->distinct()->get(['code_daily_sales_report', 'date_report', 'user_id']);
        return view('marketing.dailySalesReport.index', ['dailySalesReportList' => $dailySalesReport]);
    }


    public function create()
    {
        return view('marketing.dailySalesReport.partials.create');
    }


    public function store(DailySalesReportCreateRequest $request)
    {
        $dailySalesReport = new DailySalesReport();

        $dailySalesReport = DailySalesReport::create($request->all());
        $dailySalesReport->shipper = strtoupper($request->shipper);
        $dailySalesReport->address = strtoupper($request->address);
        $dailySalesReport->pic_name = strtoupper($request->pic_name);
        $dailySalesReport->email = strtolower($request->email);
        $dailySalesReport->website = strtolower($request->website);
        $dailySalesReport->commodity = strtoupper($request->commodity);
        $dailySalesReport->destination = strtoupper($request->destination);
        $dailySalesReport->remarks = strtoupper($request->remarks);
        $dailySalesReport->status = strtoupper($request->status);
        $dailySalesReport->save();

        $notification = array(
            'message' => 'Daily Sales Report Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dailySalesReport')->with($notification);
    }


    // public function show($code_daily_sales_report)
    // {
    //     $dailySalesReport = DailySalesReport::with('user')->orderBy('id', 'desc')->distinct()->get(['code_daily_sales_report']);
    //     // $dailySalesReport = DB::table('daily_sales_reports')->distinct()->get();
    //     // $dailySalesReport = DB::table('daily_sales_reports')
    //     //     ->join('users', 'id', '=', 'daily_sales_reports.user_id')
    //     //     ->select('daily_sales_reports.*', 'users.name')
    //     //     ->distinct('daily_sales_reports.code_daily_sales_report')
    //     //     ->get();
    //     return view('marketing.dailySalesReport.partials.show', ['dailySalesReportList' => $dailySalesReport]);
    // }

    // public function show($daily_sales_report_show)
    // {
    //     $dailySalesReportShow = DailySalesReport::find($daily_sales_report_show);
    //     return view('marketing.dailySalesReport.partials.show', ['dailySalesReportList' => $dailySalesReportShow]);
    // }

    public function show()
    {
        $dailySalesReportShow = DailySalesReport::with('user')->orderBy('id','desc')->get();
        return view('marketing.dailySalesReport.partials.show',['dailySalesReportShowList' => $dailySalesReportShow]);
    }

    // public function showDetail($id)
    // {
    //     $dailySalesReportDetail = DailySalesReport::find($id);
    //     return view('marketing.dailySalesReport.partials.showDetail', ['dailySalesReport' => $dailySalesReportDetail]);
    // }


    public function edit(DailySalesReport $dailySalesReport, $id)
    {
        $dailySalesReport = DailySalesReport::findOrfail($id);
        return view('marketing.dailySalesReport.partials.edit', ['dailySalesReport' => $dailySalesReport]);
    }


    public function update(Request $request, $id)
    {
        $dailySalesReport = DailySalesReport::findOrfail($id);

        $dailySalesReport->update($request->all());
        $dailySalesReport->shipper = strtoupper($request->shipper);
        $dailySalesReport->address = strtoupper($request->address);
        $dailySalesReport->pic_name = strtoupper($request->pic_name);
        $dailySalesReport->email = strtolower($request->email);
        $dailySalesReport->website = strtolower($request->website);
        $dailySalesReport->commodity = strtoupper($request->commodity);
        $dailySalesReport->destination = strtoupper($request->destination);
        $dailySalesReport->remarks = strtoupper($request->remarks);
        $dailySalesReport->status = strtoupper($request->status);
        $dailySalesReport->save();

        $notification = array(
            'message' => 'Data Daily Sales Report Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dailySalesReport')->with($notification);
    }


    public function destroy($id)
    {
        $dailySalesReport = DailySalesReport::findOrFail($id);
        DailySalesReport::where('id', '=', $id)->delete();
        return redirect()->back()->with('message', 'Data Daily Sales Report Deleted Successfully');
    }
}
