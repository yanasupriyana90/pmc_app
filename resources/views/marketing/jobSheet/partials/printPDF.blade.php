<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobsheet Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte') }}/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="{{ asset('lte') }}/dist/img/logoFreight.png" width="60%">
                </div>
                <div class="col-4 text-center mb-4" style="align-self: center">
                    <h4><u><b>Job Sheet</b></u></h4>
                </div>
                <div class="col-4 text-center mb-4" style="align-self: center">
                    <small class="float-right">Print Date : {{ date('d M Y') }}</small>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <div class="row invoice-info">
                <div class="col-4 invoice-col">
                    <address>
                        <strong>Jobsheet Code : </strong> {{ $jobSheetHeadList->code_js }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                    <address>
                        <strong>Booking No. : </strong>
                        @if (empty($jobSheetHeadList->booking_no))
                            -
                        @else
                            {{ $jobSheetHeadList->booking_no }}
                        @endif
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <hr size="100" noshade>

            <div class="row invoice-info">
                <div class="col-4 invoice-col">
                    <strong>Shipper :</strong>
                    <address>
                        <strong>{{ $jobSheetHeadList->shipper['name'] }}</strong>
                        {{-- <br>
                        {{ $jobSheetHeadList->shipper['address'] }}<br>
                        Phone : {{ $jobSheetHeadList->shipper['phone_1'] }}
                        @if (empty($jobSheetHeadList->shipper['phone_2']))
                        @else
                            /{{ $jobSheetHeadList->shipper['phone_2'] }}
                        @endif
                        <br>
                        Fax : @if (empty($jobSheetHeadList->shipper['fax']))
                            -
                        @else
                            {{ $jobSheetHeadList->shipper['fax'] }}
                        @endif
                        <br>
                        Email : @if (empty($jobSheetHeadList->shipper['email']))
                            -
                        @else
                            {{ $jobSheetHeadList->shipper['email'] }}
                        @endif
                        <br>
                        Tax Type : @if (empty($jobSheetHeadList->shipper->mandatoryTax['name']))
                            -
                        @else
                            {{ $jobSheetHeadList->shipper->mandatoryTax['name'] }}
                        @endif
                        <br>
                        Tax ID : @if (empty($jobSheetHeadList->shipper['tax_id']))
                            -
                        @else
                            {{ $jobSheetHeadList->shipper['tax_id'] }}
                        @endif --}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                    <strong>Undername MBL :</strong>
                    <address>
                        <strong>{{ $jobSheetHeadList->undernameMbl['name'] }}</strong>
                        {{-- <br>
                        {{ $jobSheetHeadList->undernameMbl['address'] }}<br>
                        Phone : {{ $jobSheetHeadList->undernameMbl['phone_1'] }}
                        @if (empty($jobSheetHeadList->undernameMbl['phone_2']))
                        @else
                            /{{ $jobSheetHeadList->undernameMbl['phone_2'] }}
                        @endif
                        <br>
                        Fax : @if (empty($jobSheetHeadList->undernameMbl['fax']))
                            -
                        @else
                            {{ $jobSheetHeadList->undernameMbl['fax'] }}
                        @endif
                        <br>
                        Email : @if (empty($jobSheetHeadList->undernameMbl['email']))
                            -
                        @else
                            {{ $jobSheetHeadList->undernameMbl['email'] }}
                        @endif
                        <br>
                        Tax Type : @if (empty($jobSheetHeadList->undernameMbl->mandatoryTax['name']))
                            -
                        @else
                            {{ $jobSheetHeadList->undernameMbl->mandatoryTax['name'] }}
                        @endif
                        <br>
                        Tax ID : @if (empty($jobSheetHeadList->undernameMbl['tax_id']))
                            -
                        @else
                            {{ $jobSheetHeadList->undernameMbl['tax_id'] }}
                        @endif --}}
                    </address>
                </div>
                @if (empty($jobSheetHeadList->undernameHbl['name']))
                @else
                    <div class="col-sm-3 invoice-col">
                        <strong>Undername HBL :</strong>
                        <address>
                            <strong>
                                @if (empty($jobSheetHeadList->undernameHbl['name']))
                                    -
                                @else
                                    {{ $jobSheetHeadList->undernameHbl['name'] }}
                                @endif
                            </strong>
                            {{-- <br>
                            @if (empty($jobSheetHeadList->undernameHbl['address']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl['address'] }}
                            @endif
                            <br>
                            Phone : @if (empty($jobSheetHeadList->undernameHbl['phone_1']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl['phone_1'] }}
                            @endif
                            @if (empty($jobSheetHeadList->undernameHbl['phone_2']))
                            @else
                                /{{ $jobSheetHeadList->undernameHbl['phone_2'] }}
                            @endif
                            <br>
                            Fax : @if (empty($jobSheetHeadList->undernameHbl['fax']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl['fax'] }}
                            @endif
                            <br>
                            Email : @if (empty($jobSheetHeadList->undernameHbl['email']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl['email'] }}
                            @endif
                            <br>
                            Tax Type : @if (empty($jobSheetHeadList->undernameHbl->mandatoryTax['name']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl->mandatoryTax['name'] }}
                            @endif
                            <br>
                            Tax ID : @if (empty($jobSheetHeadList->undernameHbl['tax_id']))
                                -
                            @else
                                {{ $jobSheetHeadList->undernameHbl['tax_id'] }}
                            @endif --}}
                        </address>
                    </div>
                    <!-- /.col -->
                @endif
            </div>
            <!-- /.col -->
            <hr size="100" noshade>

            <div class="row invoice-info">
                <div class="col-4 invoice-col">
                    <strong>Consignee :</strong>
                    <address>
                        <strong>
                            @if (empty($jobSheetHeadList->name_cons))
                                -
                            @else
                                {{ $jobSheetHeadList->name_cons }}
                            @endif
                        </strong><br>
                        @if (empty($jobSheetHeadList->address_cons))
                            -
                        @else
                            {{ $jobSheetHeadList->address_cons }}
                        @endif
                        <br>
                        Phone : {{ $jobSheetHeadList->phone_1_cons }}
                        @if (empty($jobSheetHeadList->phone_2_cons))
                        @else
                            /{{ $jobSheetHeadList->phone_2_cons }}
                        @endif
                        <br>
                        Fax : @if (empty($jobSheetHeadList->fax_cons))
                            -
                        @else
                            {{ $jobSheetHeadList->fax_cons }}
                        @endif
                        <br>
                        Email : @if (empty($jobSheetHeadList->email_cons))
                            -
                        @else
                            {{ $jobSheetHeadList->email_cons }}
                        @endif
                        <br>
                        Tax Type : @if (empty($jobSheetHeadList->mandatoryTaxCons['name']))
                            -
                        @else
                            {{ $jobSheetHeadList->mandatoryTaxCons['name'] }}
                        @endif
                        <br>
                        Tax ID : @if (empty($jobSheetHeadList->tax_id_cons))
                            -
                        @else
                            {{ $jobSheetHeadList->tax_id_cons }}
                        @endif
                    </address>
                </div>
                <div class="col-4 invoice-col">
                    <strong>Notify Party :</strong>
                    @if (empty($jobSheetHeadList->same_as_consignee == 0))
                        <address>
                            SAME AS CONSIGNEE
                        </address>
                    @else
                        <address>
                            <strong>
                                @if (empty($jobSheetHeadList->name_notify))
                                    -
                                @else
                                    {{ $jobSheetHeadList->name_notify }}
                                @endif
                            </strong><br>
                            @if (empty($jobSheetHeadList->address_notify))
                                -
                            @else
                                {{ $jobSheetHeadList->address_notify }}
                            @endif
                            <br>
                            Phone : @if (empty($jobSheetHeadList->phone_1_notify))
                                -
                            @else
                                {{ $jobSheetHeadList->phone_1_notify }}
                            @endif
                            @if (empty($jobSheetHeadList->phone_2_notify))
                            @else
                                /{{ $jobSheetHeadList->phone_2_notify }}
                            @endif
                            <br>
                            Fax : @if (empty($jobSheetHeadList->fax_notify))
                                -
                            @else
                                {{ $jobSheetHeadList->fax_notify }}
                            @endif
                            <br>
                            Email : @if (empty($jobSheetHeadList->email_notify))
                                -
                            @else
                                {{ $jobSheetHeadList->email_notify }}
                            @endif
                            <br>
                            Tax Type : @if (empty($jobSheetHeadList->mandatoryTaxNotify['name']))
                                -
                            @else
                                {{ $jobSheetHeadList->mandatoryTaxNotify['name'] }}
                            @endif
                            <br>
                            Tax ID : @if (empty($jobSheetHeadList->tax_id_notify))
                                -
                            @else
                                {{ $jobSheetHeadList->tax_id_notify }}
                            @endif
                        </address>
                    @endif
                </div>
            </div>
            <!-- /.col -->
            <hr size="100" noshade>

            <div class="row invoice-info">
                <div class="col-4 invoice-col">
                    <address>
                        <strong>Carrier : </strong> {{ $jobSheetHeadList->carrier }}<br>
                        <strong>Vessel / Voyage : </strong> {{ $jobSheetHeadList->vessel }}<br>
                        <strong>ETD :
                        </strong>{{ $jobSheetHeadList->etd }}<br>
                        <strong>Port Of Loading : </strong> {{ $jobSheetHeadList->pol }}<br>
                        <strong>Port Of Discharge : </strong> {{ $jobSheetHeadList->pod }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                    <address>
                        <strong>Open CY : </strong>
                        @if (empty($jobSheetHeadList->open_cy))
                            -
                        @else
                            {{ $jobSheetHeadList->open_cy }}
                        @endif
                        <br>
                        <strong>Closing Document : </strong>
                        @if (empty($jobSheetHeadList->closing_doc))
                            -
                        @else
                            {{ $jobSheetHeadList->closing_doc }}
                        @endif
                        <br>
                        <strong>Closing CY : </strong>
                        @if (empty($jobSheetHeadList->closing_cy))
                            -
                        @else
                            {{ $jobSheetHeadList->closing_cy }}
                        @endif
                        <br>
                        <strong>Due Date Inv : </strong>
                        {{ $jobSheetHeadList->due_date_inv }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                    <address>
                        <strong>Volume : </strong> {{ $jobSheetHeadList->volume }}<br>
                        <strong>Size / Type Container : </strong>
                        {{ $jobSheetHeadList->containerSizeType['name'] }}<br>
                        <strong>Quantity : </strong> {{ number_format($jobSheetHeadList->qty) }}<br>
                        <strong>Type Pack : </strong> {{ $jobSheetHeadList->typePack['name'] }}
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
            <hr size="100" noshade>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Commodity M-B/L : </strong> {{ $jobSheetHeadList->commodity_mbl }}<br>
                        <strong>HS Code M-B/L : </strong> {{ $jobSheetHeadList->hs_code_mbl }}<br>
                        <strong>M-B/L : </strong>{{ $jobSheetHeadList->typeBillOfLadingMbl['name'] }}<br>
                        @if (empty($jobSheetHeadList->commodity_hbl))
                        @else
                            <strong>Commodity H-B/L : </strong>
                            @if (empty($jobSheetHeadList->commodity_hbl))
                                -
                            @else
                                {{ $jobSheetHeadList->commodity_hbl }}
                            @endif
                            <br>
                            <strong>HS Code H-B/L : </strong>
                            @if (empty($jobSheetHeadList->hs_code_hbl))
                                -
                            @else
                                {{ $jobSheetHeadList->hs_code_hbl }}
                            @endif
                            <br>
                            <strong>H-B/L : </strong>
                            @if (empty($jobSheetHeadList->typeBillOfLadingHbl['name']))
                                -
                            @else
                                {{ $jobSheetHeadList->typeBillOfLadingHbl['name'] }}
                            @endif
                        @endif
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Stuffing Date : </strong>
                        {{ $jobSheetHeadList->stuffing_date }}<br>
                        <strong>Stuffing Address : </strong> {{ $jobSheetHeadList->stuffing_address }}<br>
                        <strong>PIC Name : </strong>{{ $jobSheetHeadList->pic_name }}<br>
                        <strong>PIC Phone : </strong> {{ $jobSheetHeadList->pic_phone }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Term Of Payment : </strong> {{ $jobSheetHeadList->top }}<br>
                        <strong>Freight & Charges : </strong>
                        {{ $jobSheetHeadList->typePayment['name'] }}<br>
                        <strong>Remarks : </strong> {{ $jobSheetHeadList->remarks }}
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <hr size="100" noshade>

            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><B>Container Seal Details</B></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="text-center">
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <hr size="100" noshade>

            <!-- Table row REVENUE OF SALES / OCEAN FREIGHT -->
            <div class="card border-dark mb-2">
                <div class="card-body text-dark">
                    <div class="row justify-content-start">
                        <div class="col-4">
                            <address>
                                <b>Exchange Rate (Rp.) : </b>
                                <p class="rupiah">
                                    {{ $jobSheetHeadList->sellingBuying['exchange_rate_ros'] }}</p>
                            </address>
                        </div>
                        <div class="col-4">
                            <p class="text-md text-center"><b>REVENUE OF SALES / OCEAN FREIGHT</b>
                                <b class="d-block">SELLING RATE</b>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 3%">No</th>
                                        <th style="width: 21%">Item Name</th>
                                        <th style="width: 4%">Vol</th>
                                        <th style="width: 15%">Price ($)</th>
                                        <th style="width: 15%">Actual Amt ($)</th>
                                        <th style="width: 10%">Tax Rate (%)</th>
                                        <th style="width: 13%">Tax Amt ($)</th>
                                        <th style="width: 20%">Total ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobSheetHeadList->sellingBuying->ros as $jobSheetHead)
                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->price }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->actual_amt }}
                                            </td>
                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->tax_amt }}
                                            </td>
                                            <td class="text-right nominal">
                                                {{ $jobSheetHead->final_amount }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total ($) :</strong></h6>
                                        </td>
                                        <td class="text-right dollar">
                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_ros'] }}</strong>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total (Rp) :</strong></h6>
                                        </td>
                                        <td class="text-right rupiah">
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
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 3%">No</th>
                                        <th style="width: 21%">Item Name</th>
                                        <th style="width: 4%">Vol</th>
                                        <th style="width: 15%">Price (Rp.)</th>
                                        <th style="width: 15%">Actual Amt (Rp.)</th>
                                        <th style="width: 10%">Tax Rate (%)</th>
                                        <th style="width: 13%">Tax Amt (Rp.)</th>
                                        <th style="width: 20%">Total (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobSheetHeadList->sellingBuying->emkl as $jobSheetHead)
                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->price }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->actual_amt }}
                                            </td>
                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->tax_amt }}
                                            </td>
                                            <td class="text-right nominal">
                                                {{ $jobSheetHead->final_amount }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total (Rp) :</strong></h6>
                                        </td>
                                        <td class="text-right rupiah">
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
                            <address>
                                <b>Exchange Rate (Rp.) : </b>
                                <p class="rupiah">
                                    {{ $jobSheetHeadList->sellingBuying['exchange_rate_cos'] }}</p>
                            </address>
                        </div>
                        <div class="col-4">
                            <p class="text-md text-center"><b>COST OF SALES</b>
                                <b class="d-block">BUYING RATE</b>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table  table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 3%">No</th>
                                        <th style="width: 21%">Item Name</th>
                                        <th style="width: 4%">Vol</th>
                                        <th style="width: 15%">Price ($)</th>
                                        <th style="width: 15%">Actual Amt ($)</th>
                                        <th style="width: 10%">Tax Rate (%)</th>
                                        <th style="width: 13%">Tax Amt ($)</th>
                                        <th style="width: 20%">Total ($)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobSheetHeadList->sellingBuying->cos as $jobSheetHead)
                                        {{-- <?php dd($jobSheetHeadList); ?> --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->price }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->actual_amt }}
                                            </td>
                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->tax_amt }}
                                            </td>
                                            <td class="text-right nominal">
                                                {{ $jobSheetHead->final_amount }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total ($) :</strong></h6>
                                        </td>
                                        <td class="text-right dollar">
                                            <h5><strong>{{ $jobSheetHeadList->sellingBuying['total_cos'] }}</strong>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total (Rp) :</strong></h6>
                                        </td>
                                        <td class="text-right rupiah">
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
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 3%">No</th>
                                        <th style="width: 21%">Item Name</th>
                                        <th style="width: 4%">Vol</th>
                                        <th style="width: 15%">Price (Rp.)</th>
                                        <th style="width: 15%">Actual Amt (Rp.)</th>
                                        <th style="width: 10%">Tax Rate (%)</th>
                                        <th style="width: 13%">Tax Amt (Rp.)</th>
                                        <th style="width: 20%">Total (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobSheetHeadList->sellingBuying->handling as $jobSheetHead)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $jobSheetHead->item_name }}</td>
                                            <td class="text-center">{{ $jobSheetHead->volume }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->price }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->actual_amt }}
                                            </td>
                                            <td class="text-center">{{ $jobSheetHead->tax_rate }}</td>
                                            <td class="text-right nominal">{{ $jobSheetHead->tax_amt }}
                                            </td>
                                            <td class="text-right nominal">
                                                {{ $jobSheetHead->final_amount }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <h6><strong>Total (Rp) :</strong></h6>
                                        </td>
                                        <td class="text-right rupiah">
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

                <!-- /.col -->
                <div class="col-6 offset-6">
                    <p class="lead">Accumulation</p>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tr>
                                <th style="width:50%">
                                    <h6><strong>Grand Total Selling (Rp.) :</strong></h6>
                                </th>
                                <td class="text-right rupiah">
                                    <h5><strong>
                                            {{ $jobSheetHeadList->sellingBuying['grand_total_selling'] }}</strong>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6><strong>Grand Total Buying (Rp.) :</strong></h6>
                                </th>
                                <td class="text-right rupiah">
                                    <h5><strong>
                                            {{ $jobSheetHeadList->sellingBuying['grand_total_buying'] }}</strong>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <h6><strong>Profit / Loss (Rp.) :</strong></h6>
                                </th>
                                <td class="text-right rupiah">
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

            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6 text-center mt-5">
                    <address class="mb-5">
                        Bandung, {{ date('d M Y') }}<br>
                        Prepared By,
                    </address>
                    {{-- <p>Bandung, {{ date('d-M-Y') }}</p>
                    <p class="mb-5">Prepared By,</p> --}}
                    <p>{{ $jobSheetHeadList->sales_name }}</p>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script src="{{ asset('lte') }}/plugins/jquery/jquery.js"></script>
    <script src="{{ asset('lte') }}/plugins/inputmask/jquery.inputmask.min.js"></script>

    <script>
        $(document).ready(function() {
            $(function() {
                maskReload();
                printOut();
            });

            function maskReload() {
                $('.nominal').inputmask({
                    alias: 'numeric',
                    prefix: '', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,

                });

                $('.rupiah').inputmask({
                    alias: 'numeric',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.dollar').inputmask({
                    alias: 'numeric',
                    prefix: '$ ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });
                // $('.tgl').inputmask('99/99/9999'
                // );

            }

            function printOut() {
                window.addEventListener("load", window.print());
            }

        });
    </script>


    {{-- <script>
        window.addEventListener("load", function() {
            window.print();
        });
    </script> --}}
</body>

</html>