@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
@section('subtitle_2', 'Show Data')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('subtitle')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jobSheet') }}">@yield('subtitle')</a></li>
                            <li class="breadcrumb-item active">@yield('subtitle_2')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12 mb-3">
                                    {{-- <h4>
                                        <i class="fas fa-globe"></i> Pundi Mas Corps
                                        <small class="float-right">Date: 2/10/2014</small>
                                    </h4> --}}
                                    <img src="{{ asset('lte') }}/dist/img/logoFreight.png" width="20%">

                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-12 text-center mb-3">
                                    <h4><u>Job Sheet</u></h4>
                                </div>
                            </div>
                            <!-- info row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <dl class="row">
                                        <dt class="col-sm-4 text-sm">Jobsheet Code</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->code_js }}</dd>
                                        <dt class="col-sm-4 text-sm">Booking No.</dt>
                                        <dd class="col-sm-8 text-sm">
                                            @if (empty($jobSheetHeadList->booking_no))
                                                <p>-</p>
                                            @else
                                                <p>{{ $jobSheetHeadList->booking_no }}</p>
                                            @endif
                                        </dd>
                                        <dt class="col-sm-4 text-sm">Shipper</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->shipper['name'] }}</dd>
                                        <dt class="col-sm-4 text-sm">Undername MBL</dt>
                                        <dd class="col-sm-8 text-sm">
                                            @if (empty($jobSheetHeadList->undernameMbl))
                                                <p>-</p>
                                            @else
                                                <p>{{ $jobSheetHeadList->undernameMbl['name'] }}</p>
                                            @endif
                                        </dd>
                                        <dt class="col-sm-4 text-sm">Undername HBL</dt>
                                        <dd class="col-sm-8 text-sm">
                                            @if (empty($jobSheetHeadList->undernameHbl))
                                                <p>-</p>
                                            @else
                                                <p>{{ $jobSheetHeadList->undernameHbl['name'] }}</p>
                                            @endif
                                        </dd>
                                        <dt class="col-sm-4 text-sm">Container Type</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->containerSizeType['name'] }}</dd>
                                        <dt class="col-sm-4 text-sm">Port Of Discharge</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->pod }}</dd>
                                    </dl>
                                </div>
                                <!-- /.col -->
                                {{-- <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>John Doe</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (555) 539-1037<br>
                                        Email: john.doe@example.com
                                    </address>
                                </div> --}}
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <dl class="row">
                                        <dt class="col-sm-4 text-sm">Carrier</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->carrier }}</dd>
                                        <dt class="col-sm-4 text-sm">Vessel</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->vessel }}</dd>
                                        <dt class="col-sm-4 text-sm">ETD</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->etd }}</dd>
                                        <dt class="col-sm-4 text-sm">Freight & Charges</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->typePayment['name'] }}</dd>
                                        <dt class="col-sm-4 text-sm">Volume</dt>
                                        <dd class="col-sm-8 text-sm">{{ $jobSheetHeadList->volume }}</dd>
                                    </dl>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title"><b>Container Seal Details</b></h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Container No.</th>
                                                            <th>Seal No.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($jobSheetHeadList->contSealDetail as $jobSheetHead)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $jobSheetHead->cont_name }}</td>
                                                                <td>{{ $jobSheetHead->seal_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            <!-- Table row REVENUE OF SALES / OCEAN FREIGHT -->
                            <div class="card border-dark mb-2">
                                <div class="card-body text-dark">
                                    <div class="row justify-content-start">
                                        <div class="col-4">
                                            <p for=""><b>Exchange Rate (Rp.) :</b>
                                                {{ $jobSheetHeadList->sellingBuying['exchange_rate_ros'] }}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-md text-center"><b>REVENUE OF SALES / OCEAN FREIGHT</b>
                                                <b class="d-block">SELLING RATE</b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5%">No</th>
                                                        <th class="text-left" style="width: 20%">Item Name</th>
                                                        <th class="text-center" style="width: 5%">Volume</th>
                                                        <th class="text-right" style="width: 15%">Price ($)</th>
                                                        <th class="text-right" style="width: 15%">Actual Amt ($)</th>
                                                        <th class="text-center" style="width: 12%">Tax Rate (%)</th>
                                                        <th class="text-right" style="width: 13%">Tax Amt ($)</th>
                                                        <th class="text-right" style="width: 15%">Total ($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jobSheetHeadList->sellingBuying->ros as $jobSheetHead)
                                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->price }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->actual_amt }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->tax_amt }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->final_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total ($) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_ros'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total (Rp.) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_ex_rate_ros'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row REVENUE OF SALES / OCEAN FREIGHT -->

                            <!-- Table row REVENUE OF SALES / EMKL -->
                            <div class="card border-dark mb-2">
                                <div class="card-body text-dark">
                                    <div class="row justify-content-start">
                                        <div class="col-12">
                                            <p class="text-md text-center"><b>REVENUE OF SALES / EMKL</b>
                                                <b class="d-block">SELLING RATE</b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5%">No</th>
                                                        <th class="text-left" style="width: 20%">Item Name</th>
                                                        <th class="text-center" style="width: 5%">Volume</th>
                                                        <th class="text-right" style="width: 15%">Price (Rp.)</th>
                                                        <th class="text-right" style="width: 15%">Actual Amt (Rp.)</th>
                                                        <th class="text-center" style="width: 12%">Tax Rate (%)</th>
                                                        <th class="text-right" style="width: 13%">Tax Amt (Rp.)</th>
                                                        <th class="text-right" style="width: 15%">Total (Rp.)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jobSheetHeadList->sellingBuying->emkl as $jobSheetHead)
                                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->price }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->actual_amt }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->tax_amt }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->final_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total (Rp.) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_emkl'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row REVENUE OF SALES / EMKL -->

                            <!-- Table row COST OF SALES -->
                            <div class="card border-dark mb-2">
                                <div class="card-body text-dark">
                                    <div class="row justify-content-start">
                                        <div class="col-4">
                                            <p for=""><b>Exchange Rate (Rp.) :</b>
                                                {{ $jobSheetHeadList->sellingBuying['exchange_rate_cos'] }}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-md text-center"><b>COST OF SALES</b>
                                                <b class="d-block">BUYING RATE</b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5%">No</th>
                                                        <th class="text-left" style="width: 20%">Item Name</th>
                                                        <th class="text-center" style="width: 5%">Volume</th>
                                                        <th class="text-right" style="width: 15%">Price ($)</th>
                                                        <th class="text-right" style="width: 15%">Actual Amt ($)</th>
                                                        <th class="text-center" style="width: 12%">Tax Rate (%)</th>
                                                        <th class="text-right" style="width: 13%">Tax Amt ($)</th>
                                                        <th class="text-right" style="width: 15%">Total ($)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jobSheetHeadList->sellingBuying->cos as $jobSheetHead)
                                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->price }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->actual_amt }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->tax_amt }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->final_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total ($) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_cos'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total (Rp.) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_ex_rate_cos'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row COST OF SALES -->

                            <!-- Table row COST OF SALES (HANDLING) -->
                            <div class="card border-dark mb-2">
                                <div class="card-body text-dark">
                                    <div class="row justify-content-start">
                                        <div class="col-12">
                                            <p class="text-md text-center"><b>COST OF SALES (HANDLING)</b>
                                                <b class="d-block">BUYING RATE</b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5%">No</th>
                                                        <th class="text-left" style="width: 20%">Item Name</th>
                                                        <th class="text-center" style="width: 5%">Volume</th>
                                                        <th class="text-right" style="width: 15%">Price (Rp.)</th>
                                                        <th class="text-right" style="width: 15%">Actual Amt (Rp.)</th>
                                                        <th class="text-center" style="width: 12%">Tax Rate (%)</th>
                                                        <th class="text-right" style="width: 13%">Tax Amt (Rp.)</th>
                                                        <th class="text-right" style="width: 15%">Total (Rp.)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jobSheetHeadList->sellingBuying->handling as $jobSheetHead)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->price }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->actual_amt }}</td>
                                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->tax_amt }}</td>
                                                            <td class="text-right">{{ $jobSheetHead->final_amount }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="7" class="text-right">
                                                            <h5><strong>Total (Rp.) :</strong></h5>
                                                        </td>
                                                        <td class="text-right">
                                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_handling'] }}</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row COST OF SALES (HANDLING) -->

                            <div class="row">
                                <!-- accepted payments column -->

                                <div class="col-6">
                                    <p class="lead">Remarks:</p>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        {{ $jobSheetHeadList->sellingBuying['remark'] }}
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Accumulation</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">
                                                    <h5><strong>Grand Total Selling (Rp.) :</strong></h5>
                                                </th>
                                                <td class="text-right">
                                                    <h5><strong>
                                                            {{ $jobSheetHeadList->sellingBuying['grand_total_selling'] }}</strong>
                                                    </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h5><strong>Grand Total Buying (Rp.) :</strong></h5>
                                                </th>
                                                <td class="text-right">
                                                    <h5><strong>
                                                            {{ $jobSheetHeadList->sellingBuying['grand_total_buying'] }}</strong>
                                                    </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h5><strong>Profit / Loss (Rp.) :</strong></h5>
                                                </th>
                                                <td class="text-right">
                                                    <h5><strong>
                                                            {{ $jobSheetHeadList->sellingBuying['profit_loss'] }}</strong>
                                                    </h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
