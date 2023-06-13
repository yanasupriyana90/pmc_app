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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <!-- /.card-header -->
                                <ul class="nav nav-tabs" id="job_sheet-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="shipper_undername-tab" data-toggle="pill"
                                            href="#shipper_undername" role="tab" aria-controls="shipper_undername"
                                            aria-selected="true">Shipper & Undername</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="consignee_notify-tab" data-toggle="pill"
                                            href="#consignee_notify" role="tab" aria-controls="consignee_notify"
                                            aria-selected="false">Consignee & Notify</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="schedule-tab" data-toggle="pill" href="#schedule"
                                            role="tab" aria-controls="schedule" aria-selected="false">Schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="description-tab" data-toggle="pill" href="#description"
                                            role="tab" aria-controls="description" aria-selected="false">Description</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="contSeal-tab" data-toggle="pill" href="#cont_seal"
                                            role="tab" aria-controls="contSeal" aria-selected="false">Container &
                                            Seal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="selling_buying-tab" data-toggle="pill"
                                            href="#selling_buying" role="tab" aria-controls="selling_buying"
                                            aria-selected="false">Selling & Buying</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="tab-content" id="job_sheet-tabContent">

                                        <!-- tab start shipper & undername -->
                                        <div class="tab-pane fade show active" id="shipper_undername" role="tabpanel"
                                            aria-labelledby="shipper_undername-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Code</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            id="code_js" value="{{ $jobSheetHead->code_js }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">No Booking</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            id="booking_no" value="{{ $jobSheetHead->booking_no }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Shipper ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_id" id="shipper_id"
                                                            value="{{ $jobSheetHead->shipper_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Shipper</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_name" id="shipper_name"
                                                            value="{{ $jobSheetHead->shipper['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="shipper_address" id="shipper_address" cols="30" rows="3"
                                                            readonly>{{ $jobSheetHead->shipper['address'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_phone_1" id="shipper_phone_1"
                                                            value="{{ $jobSheetHead->shipper['phone_1'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_phone_2" id="shipper_phone_2"
                                                            value="{{ $jobSheetHead->shipper['phone_2'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Fax</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_fax" id="shipper_fax"
                                                            value="{{ $jobSheetHead->shipper['fax'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_email" id="shipper_email"
                                                            value="{{ $jobSheetHead->shipper['email'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Mandatory Tax ->
                                                        {{ $jobSheetHead->shipper['mandatory_tax_id'] }}</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="shipper_tax_id" id="shipper_tax_id"
                                                            value="{{ $jobSheetHead->shipper['tax_id'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Undername MBL ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="undername_mbl_id" id="undername_mbl_id"
                                                            value="{{ $jobSheetHead->undername_mbl_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">M-BL / Booking</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_und_mbl" id="name_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="address_und_mbl" id="address_und_mbl" cols="30" rows="3"
                                                            readonly>{{ $jobSheetHead->undernameMbl['address'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['phone_1'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_2_und_mbl" id="phone_2_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['phone_2'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Fax</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="fax_und_mbl" id="fax_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['fax'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="email_und_mbl" id="email_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['email'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Mandatory Tax ->
                                                        {{ $jobSheetHead->undernameMbl['mandatory_tax_id'] }}</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="tax_id_und_mbl" id="tax_id_und_mbl"
                                                            value="{{ $jobSheetHead->undernameMbl['tax_id'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Undername HBL ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="undername_hbl_id" id="undername_hbl_id"
                                                            value="{{ $jobSheetHead->undername_hbl_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">H-BL / PEB</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_und_hbl" id="name_und_hbl"
                                                            value="{{ $jobSheetHead->undernameHbl['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="address_und_mbl" id="address_und_mbl" cols="30" rows="3"
                                                            readonly>{{ $jobSheetHead->undernameHbl['address'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                            value="{{ $jobSheetHead->undernameHbl['phone_1'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_2_und_mbl" id="phone_2_und_mbl"
                                                            value="{{ $jobSheetHead->undernameHbl['phone_2'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Fax</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="fax_und_mbl" id="fax_und_mbl"
                                                            value="{{ $jobSheetHead->undernameHbl['fax'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="email_und_mbl" id="email_und_mbl"
                                                            value="{{ $jobSheetHead->undernameHbl['email'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Mandatory Tax ->
                                                        {{ $jobSheetHead->undernameHbl['mandatory_tax_id'] }}</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="tax_id_und_hbl" id="tax_id_und_hbl"
                                                            value="{{ $jobSheetHead->undernameHbl['tax_id'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end shipper & undername -->

                                        <!-- tab start consignee & notify party -->
                                        <div class="tab-pane fade" id="consignee_notify" role="tabpanel"
                                            aria-labelledby="consignee_notify-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Consignee</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_cons" id="name_cons"
                                                            value="{{ $jobSheetHead->name_cons }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="address_cons" id="address_cons" cols="30" rows="3"
                                                            readonly>{{ $jobSheetHead->address_cons }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_1_cons" id="phone_1_cons"
                                                            value="{{ $jobSheetHead->phone_1_cons }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_2_cons" id="phone_2_cons"
                                                            value="{{ $jobSheetHead->phone_2_cons }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Fax</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="fax_cons" id="fax_cons"
                                                            value="{{ $jobSheetHead->fax_cons }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="email_cons" id="email_cons"
                                                            value="{{ $jobSheetHead->email_cons }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Mandatory Tax ->
                                                        {{ $jobSheetHead->mandatory_tax_id_cons }}</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="tax_id_cons" id="tax_id_cons"
                                                            value="{{ $jobSheetHead->tax_id_cons }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Notify Party</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_notify" id="name_notify"
                                                            value="{{ $jobSheetHead->name_notify }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="address_notify" id="address_notify" cols="30" rows="3"
                                                            readonly>{{ $jobSheetHead->address_notify }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_1_notify" id="phone_1_notify"
                                                            value="{{ $jobSheetHead->phone_1_notify }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="phone_2_notify" id="phone_2_notify"
                                                            value="{{ $jobSheetHead->phone_2_notify }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Fax</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="fax_notify" id="fax_notify"
                                                            value="{{ $jobSheetHead->fax_notify }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="email_notify" id="email_notify"
                                                            value="{{ $jobSheetHead->email_notify }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Mandatory Tax ->
                                                        {{ $jobSheetHead->mandatory_tax_id_notify }}</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="tax_id_notify" id="tax_id_notify"
                                                            value="{{ $jobSheetHead->tax_id_notify }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end consignee & notify party -->

                                        <!-- tab start schedule -->
                                        <div class="tab-pane fade" id="schedule" role="tabpanel"
                                            aria-labelledby="schedule-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Carrier</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="carrier" id="carrier"
                                                            value="{{ $jobSheetHead->carrier }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Vessel / Voyage</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="vessel" id="vessel"
                                                            value="{{ $jobSheetHead->vessel }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">ETD</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="etd" id="etd"
                                                            value="{{ $jobSheetHead->etd }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Port Of Loading</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="pol" id="pol"
                                                            value="{{ $jobSheetHead->pol }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Port Of Discharge</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="pol" id="pol"
                                                            value="{{ $jobSheetHead->pod }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Open CY</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="open_cy" id="open_cy"
                                                            value="{{ $jobSheetHead->open_cy }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Closing Document</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="closing_doc" id="closing_doc"
                                                            value="{{ $jobSheetHead->closing_doc }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Closing CY</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="closing_cy" id="closing_cy"
                                                            value="{{ $jobSheetHead->closing_cy }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr size="100" noshade>
                                        </div>
                                        <!-- tab end schedule -->

                                        <!-- tab start description -->
                                        <div class="tab-pane fade" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Volume</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="volume" id="volume"
                                                            value="{{ $jobSheetHead->volume }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Size / Type
                                                        Container ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="cont_size_type_id" id="cont_size_type_id"
                                                            value="{{ $jobSheetHead->cont_size_type_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Size / Type
                                                        Container</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_cont_size_type" id="name_cont_size_type"
                                                            value="{{ $jobSheetHead->containerSizeType['name'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Quantity</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="qty" id="qty"
                                                            value="{{ $jobSheetHead->qty }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Type Pack ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="type_packaging_id" id="type_packaging_id"
                                                            value="{{ $jobSheetHead->type_packaging_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Type Pack</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="name_type_pack" id="name_type_pack"
                                                            value="{{ $jobSheetHead->typePack['name'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Commodity M-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="commodity_mbl" id="commodity_mbl"
                                                            value="{{ $jobSheetHead->commodity_mbl }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">HS Code M-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="hs_code_mbl" id="hs_code_mbl"
                                                            value="{{ $jobSheetHead->hs_code_mbl }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">M-B/L ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="mbl_type_bl_id" id="mbl_type_bl_id"
                                                            value="{{ $jobSheetHead->mbl_type_bl_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">M-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="mbl_type_bl_id" id="mbl_type_bl_id"
                                                            value="{{ $jobSheetHead->typeBillOfLadingMbl['name'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Commodity H-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="commodity_hbl" id="commodity_hbl"
                                                            value="{{ $jobSheetHead->commodity_hbl }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">HS Code H-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="hs_code_hbl" id="hs_code_hbl"
                                                            value="{{ $jobSheetHead->hs_code_hbl }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">H-B/L ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="hbl_type_bl_id" id="hbl_type_bl_id"
                                                            value="{{ $jobSheetHead->hbl_type_bl_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">H-B/L</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="hbl_type_bl_id" id="hbl_type_bl_id"
                                                            value="{{ $jobSheetHead->typeBillOfLadingHbl['name'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Stuffing Date</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="stuffing_date" id="stuffing_date"
                                                            value="{{ $jobSheetHead->stuffing_date }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Stuffing Address</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="stuffing_address" id="stuffing_address" cols="30"
                                                            rows="3" readonly>{{ $jobSheetHead->stuffing_address }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">PIC Name</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="pic_name" id="pic_name"
                                                            value="{{ $jobSheetHead->pic_name }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">PIC Phone</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="pic_phone" id="pic_phone"
                                                            value="{{ $jobSheetHead->pic_phone }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Term Of Payment</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="top" id="top"
                                                            value="{{ $jobSheetHead->top }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Freight & Charges ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="type_payment_id" id="type_payment_id"
                                                            value="{{ $jobSheetHead->type_payment_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Freight & Charges</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="type_payment_id" id="type_payment_id"
                                                            value="{{ $jobSheetHead->typePayment['name'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Remarks</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control-plaintext" name="stuffing_address" id="stuffing_address" cols="40"
                                                            rows="4" readonly>{{ $jobSheetHead->remarks }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">File S.I</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="si_doc" id="si_doc"
                                                            value="{{ $jobSheetHead->si_doc }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Status ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="status" id="status"
                                                            value="{{ $jobSheetHead->status }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">User ID</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="user" id="user"
                                                            value="{{ $jobSheetHead->user['id'] }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">User Name</label>
                                                    <label class="col-sm-0 col-form-label">:</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            name="user" id="user"
                                                            value="{{ $jobSheetHead->user['username'] }}">
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <!-- Start Button Save -->
                                            <div class="container">
                                                <div class="d-grid gap-2 d-md-block mt-5">
                                                    {{-- <button class="btn btn-primary mr-3" type="submit">SAVE</button> --}}
                                                    <a href="#" class="btn btn-danger" type="button">CANCEL</a>
                                                </div>
                                            </div>
                                            <!-- End Button Save -->
                                        </div>
                                        <!-- tab end description -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
