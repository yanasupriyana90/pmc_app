@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
@section('subtitle_2', 'Edit Data')
@section('title_card_1', 'REVENUE OF SALES / OCEAN FREIGHT')
@section('title_card_2', 'SELLING RATE')
@section('title_card_3', 'REVENUE OF SALES / EMKL')
@section('title_card_4', 'COST OF SALES')
@section('title_card_5', 'BUYING RATE')
@section('title_card_6', 'COST OF SALES (HANDLING)')

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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content text-sm">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <!-- /.card-header -->
                                <ul class="nav nav-tabs" id="job_sheet-tab" role="tablist">
                                    <li class="nav-item active">
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
                                    <li class="nav-item">
                                        <a class="nav-link" id="selling_buying-tab" data-toggle="pill"
                                            href="#selling_buying" role="tab" aria-controls="selling_buying"
                                            aria-selected="false">Selling & Buying</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- form start -->
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="tab-content" id="job_sheet-tabContent">

                                        <!-- tab start shipper & undername -->
                                        <div class="tab-pane active" id="shipper_undername" role="tabpanel"
                                            aria-labelledby="shipper_undername-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Code Job Sheet</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="code_js" id="code_js"
                                                                value="{{ $jobSheet->code_js }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Booking No.</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="booking_no" id="booking_no"
                                                                value="{{ $jobSheet->booking_no }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sales Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="sales_name" id="sales_name"
                                                                value="{{ $jobSheet->user['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="shipper_id" id="shipper_id" value="{{ $jobSheet->shipper['id'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Shipper</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_ship" id="name_ship"
                                                                value="{{ $jobSheet->shipper['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_ship" id="phone_1_ship" value="{{ $jobSheet->shipper['phone_1'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_ship" id="phone_2_ship" value="{{ $jobSheet->shipper['phone_2'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_ship" id="fax_ship" value="{{ $jobSheet->shipper['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_ship" id="address_ship" rows="3"
                                                                readonly>{{ $jobSheet->shipper['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_ship" id="email_ship" value="{{ $jobSheet->shipper['email'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label>Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_ship"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_ship" value="{{ $jobSheet->shipper->mandatoryTax['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Tax ID</label>
                                                            <input type="text" name="tax_id_ship"
                                                                class="form-control form-control-sm" id="tax_id_ship" value="{{ $jobSheet->shipper['tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="undername_mbl_id" id="undername_mbl_id" value="{{ $jobSheet->undername_mbl_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>M-BL / Booking</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_mbl" id="name_und_mbl" value="{{ $jobSheet->undernameMbl['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl" value="{{ $jobSheet->undernameMbl['phone_1'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_mbl" id="phone_2_und_mbl" value="{{ $jobSheet->undernameMbl['phone_2'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_mbl" id="fax_und_mbl" value="{{ $jobSheet->undernameMbl['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_mbl" id="address_und_mbl"
                                                                rows="3" readonly>{{ $jobSheet->undernameMbl['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_mbl" id="email_und_mbl" value="{{ $jobSheet->undernameMbl['email'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label>Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_mbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_mbl" value="{{ $jobSheet->undernameMbl->mandatoryTax['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Tax ID</label>
                                                            <input type="text" name="tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="tax_id_und_mbl" value="{{ $jobSheet->undernameMbl['tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="undername_hbl_id" id="undername_hbl_id" value="{{ $jobSheet->undername_mbl_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="use_und_hbl" id="checkBoxUndHbl"
                                                                onclick="showDivUndHblAll()">
                                                            <label for="checkBoxUndHbl" class="custom-control-label">Use
                                                                H-BL / PEB</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="container" id="und_hbl_group" style="display: none;">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>H-BL / PEB</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_hbl" id="name_und_hbl" value="{{ $jobSheet->undernameHbl['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_hbl" id="phone_1_und_hbl" value="{{ $jobSheet->undernameHbl['phone_1'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_hbl" id="phone_2_und_hbl" value="{{ $jobSheet->undernameHbl['phone_2'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_hbl" id="fax_und_hbl" value="{{ $jobSheet->undernameHbl['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_hbl" id="address_und_hbl"
                                                                rows="3" readonly>{{ $jobSheet->undernameHbl['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_hbl" id="email_und_hbl" value="{{ $jobSheet->undernameHbl['email'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label>Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_hbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_hbl" value="{{ $jobSheet->undernameHbl->mandatoryTax['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Tax ID</label>
                                                            <input type="text" name="tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="tax_id_und_hbl" value="{{ $jobSheet->undernameHbl['tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="container">
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end shipper & undername -->

                                        <!-- tab start consignee & notify party -->
                                        <div class="tab-pane" id="consignee_notify" role="tabpanel"
                                            aria-labelledby="consignee_notify-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Consignee</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cons" id="name_cons"
                                                                value="{{ $jobSheet->name_cons }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor"
                                                                name="phone_1_cons" id="phone_1_cons"
                                                                value="{{ $jobSheet->phone_1_cons }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor"
                                                                name="phone_2_cons" id="phone_2_cons"
                                                                value="{{ $jobSheet->phone_2_cons }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor" name="fax_cons"
                                                                id="fax_cons" value="{{ $jobSheet->fax_cons }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_cons" id="address_cons" rows="3">{{ $jobSheet->address_cons }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_cons" id="email_cons"
                                                                value="{{ $jobSheet->email_cons }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label>Mandatory Tax</label>
                                                            <select name="mandatory_tax_id_cons"
                                                                id="mandatory_tax_id_cons"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;" onchange="showDivCons(this)">
                                                                {{-- @foreach ($mandatoryTax as $item)
                                                                    <option
                                                                        value="{{ old('mandatory_tax_id_cons', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_cons"
                                                            style="display: none;">
                                                            <label>Tax ID</label>
                                                            <input type="text" name="tax_id_cons"
                                                                class="form-control form-control-sm" id="tax_id_cons"
                                                                value="{{ $jobSheet->tax_id_cons }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            {{-- <div class="container">
                                                <div class="row mt-5">
                                                    <div class="col-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="same_as_consignee" id="checkBoxNotify"
                                                                onclick="showDivNotifyAll()" value="0">
                                                            <label for="checkBoxNotify" class="custom-control-label">SAME
                                                                AS CONSIGNEE</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-1" hidden>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="same_as_consignee_input" id="checkBoxNotifyInput"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="container" id="notify_party_group">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Notify Party</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_notify" id="name_notify"
                                                                value="{{ $jobSheet->name_notify }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 1</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor"
                                                                name="phone_1_notify" id="phone_1_notify"
                                                                value="{{ $jobSheet->phone_1_notify }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Phone 2</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor"
                                                                name="phone_2_notify" id="phone_2_notify"
                                                                value="{{ $jobSheet->phone_2_notify }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm nomor"
                                                                name="fax_notify" id="fax_notify"
                                                                value="{{ $jobSheet->fax_notify }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_notify" id="address_notify"
                                                                rows="3">{{ $jobSheet->address_notify }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_notify" id="email_notify"
                                                                value="{{ $jobSheet->email_notify }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label>Mandatory Tax</label>
                                                            <select name="mandatory_tax_id_notify"
                                                                id="mandatory_tax_id_notify"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;" onchange="showDivNotify(this)">
                                                                {{-- @foreach ($mandatoryTax as $item)
                                                                    <option
                                                                        value="{{ old('mandatory_tax_id_notify', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_notify"
                                                            style="display: none;">
                                                            <label>Tax ID</label>
                                                            <input type="text" name="tax_id_notify"
                                                                class="form-control form-control-sm" id="tax_id_notify"
                                                                value="{{ $jobSheet->tax_id_notify }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end consignee & notify party -->

                                        <!-- tab start schedule -->
                                        <div class="tab-pane" id="schedule" role="tabpanel"
                                            aria-labelledby="schedule-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Carrier</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="carrier" id="carrier"
                                                                value="{{ $jobSheet->carrier }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Vessel / Voyage</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="vessel" id="vessel"
                                                                value="{{ $jobSheet->vessel }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>ETD :</label>

                                                            <input type="date" name="etd" id="etd"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->etd)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Port Of Loading</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pol" id="pol"
                                                                value="{{ $jobSheet->pol }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Port Of Discharge</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pod" id="pod"
                                                                value="{{ $jobSheet->pod }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Open CY :</label>
                                                            <input type="datetime-local" name="open_cy"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->open_cy)->format('Y-m-d H:i') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Closing Document :</label>
                                                            <input type="datetime-local" name="closing_doc"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->closing_doc)->format('Y-m-d H:i') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Closing CY :</label>
                                                            <input type="datetime-local" name="closing_cy"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->closing_cy)->format('Y-m-d H:i') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end schedule -->

                                        <!-- tab start description -->
                                        <div class="tab-pane" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label>Volume</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase nomor"
                                                                name="volume" id="volume"
                                                                value="{{ $jobSheet->volume }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mr-5">
                                                        <div class="form-group">
                                                            <label>Size / Type
                                                                Container</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cont_size_type" id="name_cont_size_type" value="{{ $jobSheet->containerSizeType['name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase nomor"
                                                                name="qty" id="qty"
                                                                value="{{ $jobSheet->qty }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Type Pack</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_type_pack" id="name_type_pack" value="{{ $jobSheet->typePack['name'] }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CONT SEAL DETAIL -->
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-sm">
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <table id="tableContSeal"
                                                                            class="table table-bordered text-center">
                                                                            <tr>
                                                                                <th class="text text-center"
                                                                                    width="3%">
                                                                                    No.</th>
                                                                                <th class="text">
                                                                                    Container No.</th>
                                                                                <th class="text">
                                                                                    Seal No.</th>

                                                                                <th class="text" width="7%"
                                                                                    rowspan="2"></th>
                                                                            </tr>

                                                                            @foreach ($jobSheet->contSealDetail as $item)
                                                                            <tr>

                                                                                <td class="text text-center"><span
                                                                                    id="cont_seal_no">{{ $loop->iteration }}</span></td>
                                                                                <td><input type="text"
                                                                                        name="contName[]" id="contName1"
                                                                                        class="form-control form-control-sm input-sm text-uppercase"
                                                                                        value="{{ $item->cont_name }}" />
                                                                                </td>
                                                                                <td><input type="text"
                                                                                        name="sealName[]" id="sealName1"
                                                                                        class="form-control form-control-sm input-sm text-uppercase"
                                                                                        value="{{ $item->seal_name }}" />
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach

                                                                        </table>
                                                                        <div align="right">
                                                                            <button type="button"
                                                                                name="add_row_cont_seal"
                                                                                id="add_row_cont_seal"
                                                                                class="btn btn-success btn-xs mr-1 mb-2"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr hidden>
                                                                    <td colspan="2" align="center">
                                                                        <input type="text" name="totalContSeal"
                                                                            id="totalContSeal" value="1" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END CONT SEAL DETAIL -->

                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="cont_size_type_id" id="cont_size_type_id" value="{{ $jobSheet->cont_size_type_id }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="type_packaging_id" id="type_packaging_id" value="{{ $jobSheet->type_packing_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Commodity M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="commodity_mbl" id="commodity_mbl"
                                                                value="{{ $jobSheet->commodity_mbl }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>HS Code M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_mbl" id="hs_code_mbl"
                                                                value="{{ $jobSheet->hs_code_mbl }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>M-B/L</label>
                                                            <select name="mbl_type_bl_id" id="mbl_type_bl_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                {{-- @foreach ($typeBlMBL as $item)
                                                                    <option
                                                                        value="{{ ($jobSheet->typeBlMBL->['name'], $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="use_commodity_hbl" id="checkBoxCommodityHbl"
                                                                onclick="showDivCommodityHblAll()">
                                                            <label for ="checkBoxCommodityHbl" class="custom-control-label">Use
                                                                Commodity H-BL</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container" id="commodity_hbl_group" style="display: none;">
                                                <div class="row mt-3">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Commodity H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="commodity_hbl" id="commodity_hbl"
                                                                value="{{ $jobSheet->commodity_hbl }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>HS Code H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_hbl" id="hs_code_hbl"
                                                                value="{{ $jobSheet->hs_code_hbl }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>H-B/L</label>
                                                            <select name="hbl_type_bl_id" id="hbl_type_bl_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                {{-- @foreach ($typeBillOfLading as $item)
                                                                    <option
                                                                        value="{{ old('hbl_type_bl_id', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Stuffing Date :</label>
                                                            <input type="date" name="stuffing_date"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->stuffing_date)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label>Stuffing
                                                                Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="stuffing_address" id="stuffing_address"
                                                                rows="3">{{ $jobSheet->stuffing_address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>PIC Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_name" id="pic_name"
                                                                value="{{ $jobSheet->pic_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>PIC Phone</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase nomor"
                                                                name="pic_phone" id="pic_phone"
                                                                value="{{ $jobSheet->pic_phone }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Term Of Payment</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="top" id="top"
                                                                value="{{ $jobSheet->top }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Freight & Charges</label>
                                                            <select name="type_payment_id" id="type_payment_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                {{-- @foreach ($typePayment as $item)
                                                                    <option
                                                                        value="{{ old('type_payment_id', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Due Date Invoice :</label>
                                                            <input type="date" name="due_date_inv"
                                                                class="form-control form-control-sm"
                                                                value="{{ \Carbon\Carbon::parse($jobSheet->due_date_inv)->format('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Remarks</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="5">{{ $jobSheet->remarks }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>File Shipping
                                                                Instruction</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="si_doc" name="si_doc">
                                                                    <label class="custom-file-label" for="si_doc">{{$jobSheet->si_doc}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 ml-5">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="status" id="status" value="0" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                            </div>
                                        </div>
                                        <!-- tab end description -->

                                        <!-- tab start Selling Buying -->
                                        <div class="tab-pane" id="selling_buying" role="tabpanel"
                                            aria-labelledby="selling_buying-tab">
                                            <div class="container">

                                                <!-- REVENUE OF SALES -->
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">@yield('title_card_1')</h3><br>
                                                        <h3 class="card-title">@yield('title_card_2')</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="col-sm-6 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Exchange Rate</label>
                                                                                <input
                                                                                    class="form-control form-control-sm input_sm rupiahRos"
                                                                                    type="text" id="exchangeRateRos"
                                                                                    name="exchangeRateRos"
                                                                                    value="{{ old('exchangeRateRos') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <td colspan="2">
                                                                                                <table id="tableRos"
                                                                                                    class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%">
                                                                                                            No.</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="20%">
                                                                                                            Item
                                                                                                            Name</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="5%">
                                                                                                            Volume
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Price
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Actual
                                                                                                            Amount</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="17%"
                                                                                                            colspan="2">
                                                                                                            Tax (%)</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="13%">
                                                                                                            Total</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%"
                                                                                                            rowspan="2">
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="7%">
                                                                                                            Rate
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text text-center">
                                                                                                            Amount ($)</th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text text-center">
                                                                                                            <span
                                                                                                                id="ros_no">1</span>
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemNameRos[]"
                                                                                                                id="itemNameRos1"
                                                                                                                class="form-control form-control-sm input-sm text-uppercase"
                                                                                                                value="{{ old('itemNameRos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="volRos[]"
                                                                                                                id="volRos1"
                                                                                                                data-ros-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only volRos"
                                                                                                                value="{{ old('volRos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="priceRos[]"
                                                                                                                id="priceRos1"
                                                                                                                data-ros-no="1"
                                                                                                                class="form-control form-control-sm input-sm dollarRos priceRos"
                                                                                                                value="{{ old('priceRos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="actualAmountRos[]"
                                                                                                                id="actualAmountRos1"
                                                                                                                data-ros-no="1"
                                                                                                                class="form-control form-control-sm input-sm dollarRos actualAmountRos"
                                                                                                                value="{{ old('actualAmountRos[0]') }}"
                                                                                                                readonly />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxRateRos[]"
                                                                                                                id="taxRateRos1"
                                                                                                                data-ros-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only taxRateRos"
                                                                                                                value="{{ old('taxRateRos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxAmountRos[]"
                                                                                                                id="taxAmountRos1"
                                                                                                                data-ros-no="1"
                                                                                                                class="form-control form-control-sm input-sm dollarRos taxAmountRos"
                                                                                                                value="{{ old('taxAmountRos[0]') }}"
                                                                                                                readonly />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemFinalAmountRos[]"
                                                                                                                id="itemFinalAmountRos1"
                                                                                                                data-ros-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm dollarRos itemFinalAmountRos"
                                                                                                                value="{{ old('itemFinalAmountRos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                                <div align="right">
                                                                                                    <button type="button"
                                                                                                        name="add_row_ros"
                                                                                                        id="add_row_ros"
                                                                                                        class="btn btn-success btn-xs"><i
                                                                                                            class="fa fa-plus"></i></button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total ($)
                                                                                            </td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountRos"
                                                                                                    name="finalTotalAmountRos"
                                                                                                    class="dollarRos"
                                                                                                    readonly>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total
                                                                                                    (Rp.)</td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountExRateRos"
                                                                                                    name="finalTotalAmountExRateRos"
                                                                                                    class="rupiahRos"
                                                                                                    readonly>
                                                                                            </td>

                                                                                        </tr>
                                                                                        <tr hidden>
                                                                                            <td colspan="2"
                                                                                                align="center">
                                                                                                <input type="text"
                                                                                                    name="totalItemRos"
                                                                                                    id="totalItemRos"
                                                                                                    value="1" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <!-- END REVENUE OF SALES -->

                                                <!-- EMKL -->
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">@yield('title_card_3')</h3><br>
                                                        <h3 class="card-title">@yield('title_card_2')</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <td colspan="2">
                                                                                                <table id="tableEmkl"
                                                                                                    class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%">
                                                                                                            No.</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="20%">
                                                                                                            Item
                                                                                                            Name</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="5%">
                                                                                                            Volume
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Price
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Actual
                                                                                                            Amount</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="17%"
                                                                                                            colspan="2">
                                                                                                            Tax (%)</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="13%">
                                                                                                            Total</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%"
                                                                                                            rowspan="2">
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            Rp.</th>
                                                                                                        <th></th>
                                                                                                        <th class="text text-center"
                                                                                                            width="7%">
                                                                                                            Rate
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text text-center">
                                                                                                            Amount (Rp.)
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            Rp.</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text text-center">
                                                                                                            <span
                                                                                                                id="emkl_no">1</span>
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemNameEmkl[]"
                                                                                                                id="itemNameEmkl1"
                                                                                                                class="form-control form-control-sm input-sm text-uppercase"
                                                                                                                value="{{ old('itemNameEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="volEmkl[]"
                                                                                                                id="volEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only volEmkl"
                                                                                                                value="{{ old('volEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="priceEmkl[]"
                                                                                                                id="priceEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                class="form-control form-control-sm input-sm rupiahEmkl priceEmkl"
                                                                                                                value="{{ old('priceEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="actualAmountEmkl[]"
                                                                                                                id="actualAmountEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                class="form-control form-control-sm input-sm rupiahEmkl actualAmountEmkl"
                                                                                                                value="{{ old('actualAmountEmkl[0]') }}"
                                                                                                                readonly />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxRateEmkl[]"
                                                                                                                id="taxRateEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only taxRateEmkl"
                                                                                                                value="{{ old('taxRateEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxAmountEmkl[]"
                                                                                                                id="taxAmountEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm rupiahEmkl taxAmountEmkl"
                                                                                                                value="{{ old('taxAmountEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemFinalAmountEmkl[]"
                                                                                                                id="itemFinalAmountEmkl1"
                                                                                                                data-emkl-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm rupiahEmkl itemFinalAmountEmkl"
                                                                                                                value="{{ old('itemFinalAmountEmkl[0]') }}" />
                                                                                                        </td>
                                                                                                        <td></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                                <div align="right">
                                                                                                    <button type="button"
                                                                                                        name="add_row_emkl"
                                                                                                        id="add_row_emkl"
                                                                                                        class="btn btn-success btn-xs"><i
                                                                                                            class="fa fa-plus"></i></button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total
                                                                                            </td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountEmkl"
                                                                                                    name="finalTotalAmountEmkl"
                                                                                                    class="rupiahEmkl"
                                                                                                    readonly>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr hidden>
                                                                                            <td colspan="2"
                                                                                                align="center">
                                                                                                <input type="text"
                                                                                                    name="totalItemEmkl"
                                                                                                    id="totalItemEmkl"
                                                                                                    value="1" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.card body -->
                                                </div>
                                                <!-- END EMKL -->

                                                <!-- COST OF SALES -->
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title">@yield('title_card_4')</h3><br>
                                                        <h3 class="card-title">@yield('title_card_5')</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="col-sm-6 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Exchange Rate</label>
                                                                                <input
                                                                                    class="form-control form-control-sm input-sm rupiahCos"
                                                                                    type="text" id="exchangeRateCos"
                                                                                    name="exchangeRateCos"
                                                                                    value="{{ old('exchangeRateRos') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <td colspan="2">
                                                                                                <table id="tableCos"
                                                                                                    class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%">
                                                                                                            No.</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="20%">
                                                                                                            Item
                                                                                                            Name</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="5%">
                                                                                                            Volume
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Price
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Actual
                                                                                                            Amount</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="17%"
                                                                                                            colspan="2">
                                                                                                            Tax (%)</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="13%">
                                                                                                            Total</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%"
                                                                                                            rowspan="2">
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="7%">
                                                                                                            Rate
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text text-center">
                                                                                                            Amount ($)</th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            $</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text text-center">
                                                                                                            <span
                                                                                                                id="cos_no">1</span>
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemNameCos[]"
                                                                                                                id="itemNameCos1"
                                                                                                                class="form-control form-control-sm input-sm text-uppercase"
                                                                                                                value="{{ old('itemNameCos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="volCos[]"
                                                                                                                id="volCos1"
                                                                                                                data-cos-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only volCos" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="priceCos[]"
                                                                                                                id="priceCos1"
                                                                                                                data-cos-no="1"
                                                                                                                class="form-control form-control-sm input-sm dollarCos priceCos"
                                                                                                                value="{{ old('priceCos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="actualAmountCos[]"
                                                                                                                id="actualAmountCos1"
                                                                                                                data-cos-no="1"
                                                                                                                class="form-control form-control-sm input-sm dollarCos actualAmountCos"
                                                                                                                value="{{ old('actualAmountCos[0]') }}"
                                                                                                                readonly />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxRateCos[]"
                                                                                                                id="taxRateCos1"
                                                                                                                data-cos-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only taxRateCos"
                                                                                                                value="{{ old('taxRateCos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxAmountCos[]"
                                                                                                                id="taxAmountCos1"
                                                                                                                data-cos-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm dollarCos taxAmountCos"
                                                                                                                value="{{ old('taxAmountCos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemFinalAmountCos[]"
                                                                                                                id="itemFinalAmountCos1"
                                                                                                                data-cos-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm dollarCos itemFinalAmountCos"
                                                                                                                value="{{ old('itemFinalAmountCos[0]') }}" />
                                                                                                        </td>
                                                                                                        <td></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                                <div align="right">
                                                                                                    <button type="button"
                                                                                                        name="add_row_cos"
                                                                                                        id="add_row_cos"
                                                                                                        class="btn btn-success btn-xs"><i
                                                                                                            class="fa fa-plus"></i></button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total
                                                                                                    ($)</td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountCos"
                                                                                                    name="finalTotalAmountCos"
                                                                                                    class="dollarCos"
                                                                                                    readonly>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total
                                                                                                    (Rp.)</td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountExRateCos"
                                                                                                    name="finalTotalAmountExRateCos"
                                                                                                    class="rupiahCos"
                                                                                                    readonly>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr hidden>
                                                                                            <td colspan="2"
                                                                                                align="center">
                                                                                                <input type="text"
                                                                                                    name="totalItemCos"
                                                                                                    id="totalItemCos"
                                                                                                    value="1" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <!-- END COST OF SALES -->

                                                <!-- HANDLING -->
                                                <div class="card card-danger">
                                                    <div class="card-header">
                                                        <h3 class="card-title">@yield('title_card_6')</h3><br>
                                                        <h3 class="card-title">@yield('title_card_5')</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12">
                                                                                <div class="table-responsive">
                                                                                    <table class="table table-bordered">
                                                                                        <tr>
                                                                                            <td colspan="2">
                                                                                                <table id="tableHand"
                                                                                                    class="table table-bordered">
                                                                                                    <tr>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%">
                                                                                                            No.</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="20%">
                                                                                                            Item
                                                                                                            Name</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="5%">
                                                                                                            Volume
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Price
                                                                                                        </th>
                                                                                                        <th class="text text-center"
                                                                                                            width="10%">
                                                                                                            Actual
                                                                                                            Amount</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="17%"
                                                                                                            colspan="2">
                                                                                                            Tax (%)</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="13%">
                                                                                                            Total</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="3%"
                                                                                                            rowspan="2">
                                                                                                        </th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th></th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            Rp.</th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            Rp.</th>
                                                                                                        <th class="text text-center"
                                                                                                            width="7%">
                                                                                                            Rate
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text text-center">
                                                                                                            Amount (Rp.)
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="text-center">
                                                                                                            Rp.</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text text-center">
                                                                                                            <span
                                                                                                                id="hand_no">1</span>
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemNameHand[]"
                                                                                                                id="itemNameHand1"
                                                                                                                class="form-control form-control-sm input-sm text-uppercase"
                                                                                                                value="{{ old('itemNameHand[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="volHand[]"
                                                                                                                id="volHand1"
                                                                                                                data-hand-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only volHand"
                                                                                                                value="{{ old('volHand[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="priceHand[]"
                                                                                                                id="priceHand1"
                                                                                                                data-hand-no="1"
                                                                                                                class="form-control form-control-sm input-sm rupiahHand priceHand"
                                                                                                                value="{{ old('priceHand[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="actualAmountHand[]"
                                                                                                                id="actualAmountHand1"
                                                                                                                data-hand-no="1"
                                                                                                                class="form-control form-control-sm input-sm rupiahHand actualAmountHand"
                                                                                                                value="{{ old('actualAmountHand[0]') }}"
                                                                                                                readonly />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxRateHand[]"
                                                                                                                id="taxRateHand1"
                                                                                                                data-hand-no="1"
                                                                                                                class="form-control form-control-sm input-sm number_only taxRateHand"
                                                                                                                value="{{ old('taxRateHand[0]') }}" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="taxAmountHand[]"
                                                                                                                id="taxAmountHand1"
                                                                                                                data-hand-no="1"
                                                                                                                value="{{ old('taxAmountHand[0]') }}"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm rupiahHand taxAmountHand" />
                                                                                                        </td>
                                                                                                        <td><input
                                                                                                                type="text"
                                                                                                                name="itemFinalAmountHand[]"
                                                                                                                id="itemFinalAmountHand1"
                                                                                                                data-hand-no="1"
                                                                                                                readonly
                                                                                                                class="form-control form-control-sm input-sm rupiahHand itemFinalAmountHand"
                                                                                                                value="{{ old('itemFinalAmountHand[0]') }}" />
                                                                                                        </td>
                                                                                                        <td></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                                <div align="right">
                                                                                                    <button type="button"
                                                                                                        name="add_row_hand"
                                                                                                        id="add_row_hand"
                                                                                                        class="btn btn-success btn-xs"><i
                                                                                                            class="fa fa-plus"></i></button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="right"><b>Total
                                                                                            </td>
                                                                                            <td align="right"><input
                                                                                                    type="text"
                                                                                                    id="finalTotalAmountHand"
                                                                                                    name="finalTotalAmountHand"
                                                                                                    class="rupiahHand"
                                                                                                    readonly>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr hidden>
                                                                                            <td colspan="2"
                                                                                                align="center">
                                                                                                <input type="text"
                                                                                                    name="totalItemHand"
                                                                                                    id="totalItemHand"
                                                                                                    value="1" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <!-- END HANDLING -->

                                                <!-- GRAND TOTAL -->
                                                <div class="row">
                                                    <!-- /.col -->
                                                    <div class="col-6 offset-6">
                                                        <p class="lead">Accumulation</p>

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">Grand Total Selling :</th>
                                                                    <td>
                                                                        <input type="text" name="grandTotalSelling"
                                                                            id="grandTotalSelling" readonly
                                                                            class="form-control form-control-sm input-sm rupiahGrandTotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Grand Total Buying :</th>
                                                                    <td>
                                                                        <input type="text" name="grandTotalBuying"
                                                                            id="grandTotalBuying"readonly
                                                                            class="form-control form-control-sm input-sm rupiahGrandTotal" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Profit/Loss :</th>
                                                                    <td>
                                                                        <input type="text" name="profitLoss"
                                                                            id="profitLoss"readonly
                                                                            class="form-control form-control-sm input-sm rupiahGrandTotal" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- END GRAND TOTAL -->
                                                <hr size="100" noshade>
                                            </div>

                                            <!-- Start Button Save -->
                                            <div class="container">
                                                <!-- Hidden User -->
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                                                <div class="d-grid gap-2 d-md-block mt-5">
                                                    <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                                    <a href="#" class="btn btn-danger" type="button">CANCEL</a>
                                                </div>
                                            </div>
                                            <!-- End Button Save -->
                                        </div>
                                        <!-- tab end Selling Buying -->

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

@section('scriptCreateJobsheet')
    <script>
        document.addEventListener("keydown", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                var formInputs = document.querySelectorAll("input, select, textarea");
                var currentFocused = document.activeElement;
                var currentIndex = Array.from(formInputs).indexOf(currentFocused);

                if (currentIndex > -1 && currentIndex < formInputs.length - 1) {
                    formInputs[currentIndex + 1].focus();
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.nomor').inputmask({
                regex: "[0-9, +]*",
            });
        });
    </script>

    <!-- CONT SEAL DETAIL SCRIPT -->
    <script>
        $(document).ready(function() {
            // var finalTotalAmountRos = $('#finalTotalAmountRos').val();
            // var finalTotalExRateAmountRos = $('#finalTotalAmountExRateRos').text();
            var count = 1;

            $(document).on('click', '#add_row_cont_seal', function() {
                count++;
                $('#totalItemRos').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_cont_seal_' + count + '">';
                html_code += '<td class="text text-center"><span id="cont_seal_no">' + count +
                    '</span></td>';

                html_code += '<td><input type="text" name="contName[]" id="contName' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';
                html_code += '<td><input type="text" name="sealName[]" id="sealName' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';

                html_code += '<td><button type="button" name="remove_row_cont_seal" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_cont_seal align-middle"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableContSeal').append(html_code);
            });

            $(document).on('click', '.remove_row_cont_seal', function() {
                var row_id_cont_seal = $(this).attr("id");
                // var total_item_amount_ros = $('#itemFinalAmountRos' + row_id_ros).val();
                // var final_amount_ros = $('#finalTotalAmountRos').val();
                // var result_amount_ros = parseFloat(final_amount_ros) - parseFloat(total_item_amount_ros);
                // var ex_rate_ros = $('#exchangeRateRos').val();
                // final_item_total_ex_rate_ros = parseFloat(result_amount_ros) * parseFloat(ex_rate_ros);
                // $('#finalTotalAmountRos').val(result_amount_ros);
                // $('#finalTotalAmountExRateRos').val(final_item_total_ex_rate_ros.toFixed(4));
                $('#row_id_cont_seal_' + row_id_cont_seal).remove();
                count--;
                $('#totalContSeal').val(count);
            });
        });
    </script>
    <!-- END CONT SEAL DETAIL SCRIPT -->

    <script>
        $(document).ready(function() {
            $('#checkBoxNotify').on('change', function() {
                this.value = this.checked ? 1 : 0;
                $('#checkBoxNotifyInput').val(this.value);
            }).change();
        });
    </script>

    <!-- REVENUE OF SALES SCRIPT -->
    <script>
        $(document).ready(function() {
            $(function() {
                maskReloadRos();
            });

            function maskReloadRos() {
                // Apply the currency input mask
                $('.rupiahRos').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.dollarRos').inputmask({
                    alias: 'currency',
                    prefix: '$ ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: '.',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.rupiahGrandTotal').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.number_only').keypress(function(e) {
                    return isNumbers(e, this);
                });

                function isNumbers(evt, element) {
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    if (
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            }

            var finalTotalAmountRos = $('#finalTotalAmountRos').val();
            // var finalTotalExRateAmountRos = $('#finalTotalAmountExRateRos').text();
            var count = 1;

            $(document).on('click', '#add_row_ros', function() {
                count++;
                $('#totalItemRos').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_ros_' + count + '">';
                html_code += '<td class="text text-center"><span id="ros_no">' + count + '</span></td>';

                html_code += '<td><input type="text" name="itemNameRos[]" id="itemNameRos' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';
                html_code += '<td><input type="text" name="volRos[]" id="volRos' + count +
                    '" data-ros-no="' + count +
                    '"class="form-control form-control-sm input-sm number_only volRos" /></td>';
                html_code += '<td><input type="text" name="priceRos[]" id="priceRos' + count +
                    '"data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarRos priceRos" /></td>';

                html_code +=
                    '<td><input type="text" name="actualAmountRos[]" id="actualAmountRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarRos actualAmountRos" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateRos[]" id="taxRateRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateRos" /></td>';
                html_code += '<td><input type="text" name="taxAmountRos[]" id="taxAmountRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarRos taxAmountRos" readonly /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountRos[]" id="itemFinalAmountRos' +
                    count + '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarRos itemFinalAmountRos" readonly /></td>';
                html_code += '<td><button type="button" name="remove_row_ros" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_ros"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableRos').append(html_code);
                maskReloadRos();
            });

            $(document).on('click', '.remove_row_ros', function() {
                var row_id_ros = $(this).attr("id");
                // var total_item_amount_ros = $('#itemFinalAmountRos' + row_id_ros).val();
                var total_item_amount_ros = $('#itemFinalAmountRos' + row_id_ros).inputmask(
                    'unmaskedvalue');
                // console.log(total_item_amount_ros);
                // var final_amount_ros = $('#finalTotalAmountRos').val();
                var final_amount_ros = $('#finalTotalAmountRos').inputmask('unmaskedvalue');
                // console.log(final_amount_ros);
                var result_amount_ros = parseFloat(final_amount_ros) - parseFloat(total_item_amount_ros);
                // var ex_rate_ros = $('#exchangeRateRos').val();
                var ex_rate_ros = $('#exchangeRateRos').inputmask('unmaskedvalue');
                final_item_total_ex_rate_ros = parseFloat(result_amount_ros) * parseFloat(ex_rate_ros);
                $('#finalTotalAmountRos').val(result_amount_ros);
                $('#finalTotalAmountExRateRos').val(final_item_total_ex_rate_ros.toFixed(4));
                $('#row_id_ros_' + row_id_ros).remove();
                count--;
                $('#totalItemRos').val(count);
                grand_total();
            });


            function cal_final_total_ros(count) {
                var final_item_total_ros = 0;
                var final_item_total_ex_rate_ros = 0;
                for (rowRos = 1; rowRos <= count; rowRos++) {
                    var ex_rate_ros = 0;
                    var vol_ros = 0;
                    var price_ros = 0;
                    var actual_amount_ros = 0;
                    var tax_rate_ros = 0;
                    var tax_amount_ros = 0;
                    var item_total_ros = 0;
                    // ex_rate_ros = $('#exchangeRateRos').val();
                    ex_rate_ros = Number($('#exchangeRateRos').inputmask('unmaskedvalue'));
                    // console.log(ex_rate_ros);

                    // final_item_total_emkl = $('#finalTotalAmountEmkl').val();
                    // if (isNaN(final_item_total_emkl)
                    //     final_item_total_emkl = 0
                    // );
                    // console.log(final_item_total_emkl);
                    vol_ros = $('#volRos' + rowRos).val();
                    if (vol_ros > 0) {
                        // price_ros = $('#priceRos' + rowRos).val();
                        price_ros = Number($('#priceRos' + rowRos).inputmask('unmaskedvalue'));

                        if (price_ros > 0) {
                            actual_amount_ros = parseFloat(vol_ros) * parseFloat(price_ros);
                            $('#actualAmountRos' + rowRos).val(actual_amount_ros);
                            tax_rate_ros = $('#taxRateRos' + rowRos).val();

                            if (tax_rate_ros >= 0) {
                                tax_amount_ros = parseFloat(actual_amount_ros) * parseFloat(tax_rate_ros) / 100;
                                $('#taxAmountRos' + rowRos).val(tax_amount_ros.toFixed(4));
                            }
                            item_total_ros = parseFloat(actual_amount_ros) + parseFloat(tax_amount_ros);
                            final_item_total_ros = parseFloat(final_item_total_ros) + parseFloat(item_total_ros);
                            final_item_total_ex_rate_ros = parseFloat(final_item_total_ros) * parseFloat(
                                ex_rate_ros);
                            // grand_total_selling = parseFloat(final_item_total_ex_rate_ros) + parseFloat(final_item_total_emkl);
                            //     console.log(grand_total_selling);
                            $('#itemFinalAmountRos' + rowRos).val(item_total_ros);
                        }
                    }
                }
                $('#finalTotalAmountRos').val(final_item_total_ros.toFixed(4));
                // console.log(final_item_total_ros);
                $('#finalTotalAmountExRateRos').val(final_item_total_ex_rate_ros.toFixed(4));
                // $('#grandTotalSelling').val(grand_total_selling.toFixed(4));
            }

            function grand_total() {
                // var total_ros = $('#finalTotalAmountExRateRos').val();
                // var total_emkl = $('#finalTotalAmountEmkl').val();
                // var total_cos = $('#finalTotalAmountExRateCos').val();
                // var total_hand = $('#finalTotalAmountHand').val();
                var total_ros = $('#finalTotalAmountExRateRos').inputmask('unmaskedvalue');
                var total_emkl = $('#finalTotalAmountEmkl').inputmask('unmaskedvalue');
                var total_cos = $('#finalTotalAmountExRateCos').inputmask('unmaskedvalue');
                var total_hand = $('#finalTotalAmountHand').inputmask('unmaskedvalue');
                var total_selling = 0;
                var total_buying = 0;
                var profit_loss = 0;
                if (!isNaN(total_ros, total_emkl)) {
                    total_selling = parseFloat(total_ros) + parseFloat(total_emkl);
                }
                if (!isNaN(total_cos, total_emkl)) {
                    total_buying = parseFloat(total_cos) + parseFloat(total_hand);
                }
                if (!isNaN(total_buying, total_selling)) {
                    profit_loss = parseFloat(total_selling) - parseFloat(total_buying);
                }
                $('#grandTotalSelling').val(total_selling.toFixed(4));
                // console.log(total_selling);
                $('#grandTotalBuying').val(total_buying.toFixed(4));
                // console.log(total_buying);
                $('#profitLoss').val(profit_loss.toFixed(4));
                // console.log(profit_loss);
            }

            $(document).on('blur', '.priceRos', function() {
                cal_final_total_ros(count);
                grand_total();

            });

            $(document).on('blur', '.taxRateRos', function() {
                cal_final_total_ros(count);
                grand_total();
            });
        });
    </script>
    <!-- END REVENUE OF SALES SCRIPT -->

    <!-- EMKL SCRIPT -->
    <script>
        $(document).ready(function() {
            $(function() {
                maskReloadEmkl();
            });

            function maskReloadEmkl() {
                // Apply the currency input mask
                $('.rupiahEmkl').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.rupiahGrandTotal').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.number_only').keypress(function(e) {
                    return isNumbers(e, this);
                });

                function isNumbers(evt, element) {
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    if (
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            }

            var finalTotalAmountEmkl = $('#finalTotalAmountEmkl').val();
            var count = 1;

            $(document).on('click', '#add_row_emkl', function() {
                count++;
                $('#totalItemEmkl').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_emkl_' + count + '">';
                html_code += '<td class="text text-center"><span id="emkl_no">' + count + '</span></td>';

                html_code += '<td><input type="text" name="itemNameEmkl[]" id="itemNameEmkl' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';

                html_code += '<td><input type="text" name="volEmkl[]" id="volEmkl' + count +
                    '" data-emkl-no="' + count +
                    '"class="form-control form-control-sm input-sm number_only volEmkl" /></td>';
                html_code += '<td><input type="text" name="priceEmkl[]" id="priceEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" class="form-control form-control-sm input-sm rupiahEmkl priceEmkl" /></td>'
                html_code +=
                    '<td><input type="text" name="actualAmountEmkl[]" id="actualAmountEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" class="form-control form-control-sm input-sm rupiahEmkl actualAmountEmkl" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateEmkl[]" id="taxRateEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateEmkl" /></td>';
                html_code += '<td><input type="text" name="taxAmountEmkl[]" id="taxAmountEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm rupiahEmkl taxAmountEmkl" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountEmkl[]" id="itemFinalAmountEmkl' +
                    count + '" data-emkl-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm rupiahEmkl itemFinalAmountEmkl" /></td>';
                html_code += '<td><button type="button" name="remove_row_emkl" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_emkl"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableEmkl').append(html_code);
                maskReloadEmkl();
            });

            $(document).on('click', '.remove_row_emkl', function() {
                var row_id_emkl = $(this).attr("id");
                var total_item_amount_emkl = $('#itemFinalAmountEmkl' + row_id_emkl).inputmask(
                    'unmaskedvalue');
                var final_amount_emkl = $('#finalTotalAmountEmkl').inputmask('unmaskedvalue');
                var result_amount_emkl = parseFloat(final_amount_emkl) - parseFloat(total_item_amount_emkl);
                $('#finalTotalAmountEmkl').val(result_amount_emkl.toFixed(4));
                $('#row_id_emkl_' + row_id_emkl).remove();
                count--;
                $('#totalItemEmkl').val(count);
                grand_total();
            });

            function cal_final_total_emkl(count) {
                var final_item_total_emkl = 0;
                for (rowEmkl = 1; rowEmkl <= count; rowEmkl++) {
                    var vol_emkl = 0;
                    var price_emkl = 0;
                    var actual_amount_emkl = 0;
                    var tax_rate_emkl = 0;
                    var tax_amount_emkl = 0;
                    var item_total_emkl = 0;
                    var final_item_total_ex_rate_ros = 0
                    // final_item_total_ex_rate_ros = $('#finalTotalAmountExRateRos').val();
                    vol_emkl = $('#volEmkl' + rowEmkl).val();
                    if (vol_emkl > 0) {
                        price_emkl = $('#priceEmkl' + rowEmkl).inputmask('unmaskedvalue');
                        if (price_emkl > 0) {
                            actual_amount_emkl = parseFloat(vol_emkl) * parseFloat(price_emkl);
                            $('#actualAmountEmkl' + rowEmkl).val(actual_amount_emkl);
                            tax_rate_emkl = $('#taxRateEmkl' + rowEmkl).val();

                            if (tax_rate_emkl >= 0) {
                                tax_amount_emkl = parseFloat(actual_amount_emkl) * parseFloat(tax_rate_emkl) / 100;
                                $('#taxAmountEmkl' + rowEmkl).val(tax_amount_emkl.toFixed(4));
                            }
                            item_total_emkl = parseFloat(actual_amount_emkl) + parseFloat(tax_amount_emkl);
                            final_item_total_emkl = parseFloat(final_item_total_emkl) + parseFloat(item_total_emkl);
                            // grand_total_selling = parseFloat(final_item_total_ex_rate_ros) + parseFloat(final_item_total_emkl);
                            $('#itemFinalAmountEmkl' + rowEmkl).val(item_total_emkl);
                        }
                    }
                }
                $('#finalTotalAmountEmkl').val(final_item_total_emkl.toFixed(4));
                // $('#grandTotalSelling').val(grand_total_selling.toFixed(4));
            }

            function grand_total() {
                var total_ros = $('#finalTotalAmountExRateRos').inputmask('unmaskedvalue');
                var total_emkl = $('#finalTotalAmountEmkl').inputmask('unmaskedvalue');
                var total_cos = $('#finalTotalAmountExRateCos').inputmask('unmaskedvalue');
                var total_hand = $('#finalTotalAmountHand').inputmask('unmaskedvalue');
                var total_selling = 0;
                var total_buying = 0;
                var profit_loss = 0;
                if (!isNaN(total_ros, total_emkl)) {
                    total_selling = parseFloat(total_ros) + parseFloat(total_emkl);
                }
                if (!isNaN(total_cos, total_emkl)) {
                    total_buying = parseFloat(total_cos) + parseFloat(total_hand);
                }
                if (!isNaN(total_buying, total_selling)) {
                    profit_loss = parseFloat(total_selling) - parseFloat(total_buying);
                }
                $('#grandTotalSelling').val(total_selling.toFixed(4));
                $('#grandTotalBuying').val(total_buying.toFixed(4));
                $('#profitLoss').val(profit_loss.toFixed(4));
            }

            $(document).on('blur', '.priceEmkl', function() {
                cal_final_total_emkl(count);
                grand_total();
            });

            $(document).on('blur', '.taxRateEmkl', function() {
                cal_final_total_emkl(count);
                grand_total();
            });
        });
    </script>
    <!-- END EMKL SCRIPT -->

    <!-- COST OF SALES SCRIPT -->
    <script>
        $(document).ready(function() {
            $(function() {
                maskReloadCos();
            });

            function maskReloadCos() {
                // Apply the currency input mask
                $('.rupiahCos').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.dollarCos').inputmask({
                    alias: 'currency',
                    prefix: '$ ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: '.',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.rupiahGrandTotal').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.number_only').keypress(function(e) {
                    return isNumbers(e, this);
                });

                function isNumbers(evt, element) {
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    if (
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            }

            var finalTotalAmountCos = $('#finalTotalAmountCos').val();
            // var finalTotalExRateAmountCos = $('#finalTotalAmountExRateCos').text();
            var count = 1;

            $(document).on('click', '#add_row_cos', function() {
                count++;
                $('#totalItemCos').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_cos_' + count + '">';
                html_code += '<td class="text text-center"><span id="cos_no">' + count + '</span></td>';

                html_code += '<td><input type="text" name="itemNameCos[]" id="itemNameCos' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';
                html_code += '<td><input type="text" name="volCos[]" id="volCos' + count +
                    '" data-cos-no="' + count +
                    '"class="form-control form-control-sm input-sm number_only volCos" /></td>';
                html_code += '<td><input type="text" name="priceCos[]" id="priceCos' + count +
                    '"data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarCos priceCos" /></td>';

                html_code +=
                    '<td><input type="text" name="actualAmountCos[]" id="actualAmountCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarCos actualAmountCos" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateCos[]" id="taxRateCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateCos" /></td>';
                html_code += '<td><input type="text" name="taxAmountCos[]" id="taxAmountCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarCos taxAmountCos" readonly /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountCos[]" id="itemFinalAmountCos' +
                    count + '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm dollarCos itemFinalAmountCos" readonly /></td>';
                html_code += '<td><button type="button" name="remove_row_cos" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_cos"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableCos').append(html_code);
                maskReloadCos();
            });

            $(document).on('click', '.remove_row_cos', function() {
                var row_id_cos = $(this).attr("id");
                // var total_item_amount_cos = $('#itemFinalAmountCos' + row_id_cos).val();
                var total_item_amount_cos = $('#itemFinalAmountCos' + row_id_cos).inputmask(
                    'unmaskedvalue');
                // console.log(total_item_amount_cos);
                // var final_amount_cos = $('#finalTotalAmountCos').val();
                var final_amount_cos = $('#finalTotalAmountCos').inputmask('unmaskedvalue');
                // console.log(final_amount_cos);
                var result_amount_cos = parseFloat(final_amount_cos) - parseFloat(total_item_amount_cos);
                // var ex_rate_cos = $('#exchangeRateCos').val();
                var ex_rate_cos = $('#exchangeRateCos').inputmask('unmaskedvalue');
                final_item_total_ex_rate_cos = parseFloat(result_amount_cos) * parseFloat(ex_rate_cos);
                $('#finalTotalAmountCos').val(result_amount_cos);
                $('#finalTotalAmountExRateCos').val(final_item_total_ex_rate_cos.toFixed(4));
                $('#row_id_cos_' + row_id_cos).remove();
                count--;
                $('#totalItemCos').val(count);
                grand_total();
            });


            function cal_final_total_cos(count) {
                var final_item_total_cos = 0;
                var final_item_total_ex_rate_cos = 0;
                for (rowCos = 1; rowCos <= count; rowCos++) {
                    var ex_rate_cos = 0;
                    var vol_cos = 0;
                    var price_cos = 0;
                    var actual_amount_cos = 0;
                    var tax_rate_cos = 0;
                    var tax_amount_cos = 0;
                    var item_total_cos = 0;
                    // ex_rate_cos = $('#exchangeRateCos').val();
                    ex_rate_cos = Number($('#exchangeRateCos').inputmask('unmaskedvalue'));
                    // console.log(ex_rate_cos);

                    // final_item_total_emkl = $('#finalTotalAmountEmkl').val();
                    // if (isNaN(final_item_total_emkl)
                    //     final_item_total_emkl = 0
                    // );
                    // console.log(final_item_total_emkl);
                    vol_cos = $('#volCos' + rowCos).val();
                    if (vol_cos > 0) {
                        // price_cos = $('#priceCos' + rowCos).val();
                        price_cos = Number($('#priceCos' + rowCos).inputmask('unmaskedvalue'));

                        if (price_cos > 0) {
                            actual_amount_cos = parseFloat(vol_cos) * parseFloat(price_cos);
                            $('#actualAmountCos' + rowCos).val(actual_amount_cos);
                            tax_rate_cos = $('#taxRateCos' + rowCos).val();

                            if (tax_rate_cos >= 0) {
                                tax_amount_cos = parseFloat(actual_amount_cos) * parseFloat(tax_rate_cos) / 100;
                                $('#taxAmountCos' + rowCos).val(tax_amount_cos.toFixed(4));
                            }
                            item_total_cos = parseFloat(actual_amount_cos) + parseFloat(tax_amount_cos);
                            final_item_total_cos = parseFloat(final_item_total_cos) + parseFloat(item_total_cos);
                            final_item_total_ex_rate_cos = parseFloat(final_item_total_cos) * parseFloat(
                                ex_rate_cos);
                            // grand_total_selling = parseFloat(final_item_total_ex_rate_cos) + parseFloat(final_item_total_emkl);
                            //     console.log(grand_total_selling);
                            $('#itemFinalAmountCos' + rowCos).val(item_total_cos);
                        }
                    }
                }
                $('#finalTotalAmountCos').val(final_item_total_cos.toFixed(4));
                // console.log(final_item_total_cos);
                $('#finalTotalAmountExRateCos').val(final_item_total_ex_rate_cos.toFixed(4));
                // $('#grandTotalSelling').val(grand_total_selling.toFixed(4));
            }

            function grand_total() {
                var total_ros = $('#finalTotalAmountExRateRos').inputmask('unmaskedvalue');
                var total_emkl = $('#finalTotalAmountEmkl').inputmask('unmaskedvalue');
                var total_cos = $('#finalTotalAmountExRateCos').inputmask('unmaskedvalue');
                var total_hand = $('#finalTotalAmountHand').inputmask('unmaskedvalue');
                var total_selling = 0;
                var total_buying = 0;
                var profit_loss = 0;
                if (!isNaN(total_ros, total_emkl)) {
                    total_selling = parseFloat(total_ros) + parseFloat(total_emkl);
                }
                if (!isNaN(total_cos, total_emkl)) {
                    total_buying = parseFloat(total_cos) + parseFloat(total_hand);
                }
                if (!isNaN(total_buying, total_selling)) {
                    profit_loss = parseFloat(total_selling) - parseFloat(total_buying);
                }
                $('#grandTotalSelling').val(total_selling.toFixed(4));
                $('#grandTotalBuying').val(total_buying.toFixed(4));
                $('#profitLoss').val(profit_loss.toFixed(4));
            }

            $(document).on('blur', '.priceCos', function() {
                cal_final_total_cos(count);
                grand_total();

            });

            $(document).on('blur', '.taxRateCos', function() {
                cal_final_total_cos(count);
                grand_total();
            });
        });
    </script>
    <!-- END COST OF SALES SCRIPT -->

    <!-- HANDLING SCRIPT -->
    <script>
        $(document).ready(function() {
            $(function() {
                maskReloadHand();
            });

            function maskReloadHand() {
                $('.rupiahHand').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.rupiahGrandTotal').inputmask({
                    alias: 'currency',
                    prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                    suffix: '', // You can set a suffix here, e.g., ' USD'
                    groupSeparator: '.', // Set the group separator, e.g., for thousands
                    // radixPoint: ',',  // Set the group separator, e.g., for thousands
                    digits: 4, // Set the number of decimal digits
                    autoGroup: true, // Automatically groups thousands
                    rightAlign: false, // Align the currency symbol to the left
                    removeMaskOnSubmit: true,
                });

                $('.number_only').keypress(function(e) {
                    return isNumbers(e, this);
                });

                function isNumbers(evt, element) {
                    var charCode = (evt.which) ? evt.which : event.keyCode;
                    if (
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            }

            var finalTotalAmountHand = $('#finalTotalAmountHand').val();
            var count = 1;

            $(document).on('click', '#add_row_hand', function() {
                count++;
                $('#totalItemHand').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_hand_' + count + '">';
                html_code += '<td class="text text-center"><span id="hand_no">' + count + '</span></td>';

                html_code += '<td><input type="text" name="itemNameHand[]" id="itemNameHand' + count +
                    '" class="form-control form-control-sm input-sm text-uppercase" /></td>';

                html_code += '<td><input type="text" name="volHand[]" id="volHand' + count +
                    '" data-hand-no="' + count +
                    '"class="form-control form-control-sm input-sm number_only volHand" /></td>';
                html_code += '<td><input type="text" name="priceHand[]" id="priceHand' + count +
                    '" data-hand-no="' + count +
                    '" class="form-control form-control-sm input-sm rupiahHand priceHand" /></td>'
                html_code +=
                    '<td><input type="text" name="actualAmountHand[]" id="actualAmountHand' + count +
                    '" data-hand-no="' + count +
                    '" class="form-control form-control-sm input-sm rupiahHand actualAmountHand" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateHand[]" id="taxRateHand' + count +
                    '" data-hand-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateHand" /></td>';
                html_code += '<td><input type="text" name="taxAmountHand[]" id="taxAmountHand' + count +
                    '" data-hand-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm rupiahHand taxAmountHand" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountHand[]" id="itemFinalAmountHand' +
                    count + '" data-hand-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm rupiahHand itemFinalAmountHand" /></td>';
                html_code += '<td><button type="button" name="remove_row_hand" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_hand"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableHand').append(html_code);
                maskReloadHand();
            });

            $(document).on('click', '.remove_row_hand', function() {
                var row_id_hand = $(this).attr("id");
                var total_item_amount_hand = $('#itemFinalAmountHand' + row_id_hand).inputmask(
                    'unmaskedvalue');
                var final_amount_hand = $('#finalTotalAmountHand').inputmask('unmaskedvalue');
                var result_amount_hand = parseFloat(final_amount_hand) - parseFloat(total_item_amount_hand);
                $('#finalTotalAmountHand').val(result_amount_hand.toFixed(4));
                $('#row_id_hand_' + row_id_hand).remove();
                count--;
                $('#totalItemHand').val(count);
                grand_total();
            });

            function cal_final_total_hand(count) {
                var final_item_total_hand = 0;
                for (rowHand = 1; rowHand <= count; rowHand++) {
                    var vol_hand = 0;
                    var price_hand = 0;
                    var actual_amount_hand = 0;
                    var tax_rate_hand = 0;
                    var tax_amount_hand = 0;
                    var item_total_hand = 0;
                    var final_item_total_ex_rate_ros = 0
                    // final_item_total_ex_rate_ros = $('#finalTotalAmountExRateRos').val();
                    vol_hand = $('#volHand' + rowHand).val();
                    if (vol_hand > 0) {
                        price_hand = $('#priceHand' + rowHand).inputmask('unmaskedvalue');
                        if (price_hand > 0) {
                            actual_amount_hand = parseFloat(vol_hand) * parseFloat(price_hand);
                            $('#actualAmountHand' + rowHand).val(actual_amount_hand);
                            tax_rate_hand = $('#taxRateHand' + rowHand).val();
                            if (tax_rate_hand >= 0) {
                                tax_amount_hand = parseFloat(actual_amount_hand) * parseFloat(tax_rate_hand) / 100;
                                $('#taxAmountHand' + rowHand).val(tax_amount_hand.toFixed(4));
                            }
                            item_total_hand = parseFloat(actual_amount_hand) + parseFloat(tax_amount_hand);
                            final_item_total_hand = parseFloat(final_item_total_hand) + parseFloat(item_total_hand);
                            // grand_total_selling = parseFloat(final_item_total_ex_rate_ros) + parseFloat(final_item_total_emkl);
                            $('#itemFinalAmountHand' + rowHand).val(item_total_hand);
                        }
                    }
                }
                $('#finalTotalAmountHand').val(final_item_total_hand.toFixed(4));
                // $('#grandTotalSelling').val(grand_total_selling.toFixed(4));
            }

            function grand_total() {
                var total_ros = $('#finalTotalAmountExRateRos').inputmask('unmaskedvalue');
                var total_emkl = $('#finalTotalAmountEmkl').inputmask('unmaskedvalue');
                var total_cos = $('#finalTotalAmountExRateCos').inputmask('unmaskedvalue');
                var total_hand = $('#finalTotalAmountHand').inputmask('unmaskedvalue');
                var total_selling = 0;
                var total_buying = 0;
                var profit_loss = 0;
                if (!isNaN(total_ros, total_emkl)) {
                    total_selling = parseFloat(total_ros) + parseFloat(total_emkl);
                }
                if (!isNaN(total_cos, total_emkl)) {
                    total_buying = parseFloat(total_cos) + parseFloat(total_hand);
                }
                if (!isNaN(total_buying, total_selling)) {
                    profit_loss = parseFloat(total_selling) - parseFloat(total_buying);
                }
                $('#grandTotalSelling').val(total_selling.toFixed(4));
                $('#grandTotalBuying').val(total_buying.toFixed(4));
                $('#profitLoss').val(profit_loss.toFixed(4));
            }

            $(document).on('blur', '.priceHand', function() {
                cal_final_total_hand(count);
                grand_total();
            });

            $(document).on('blur', '.taxRateHand', function() {
                cal_final_total_hand(count);
                grand_total();
            });
        });
    </script>
    <!-- END HANDLING SCRIPT -->
@endsection
@endsection

<script>
    function showDivCons(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id_cons').value = "";
            document.getElementById('tax_id_group_cons').style.display = "block";
        } else {
            document.getElementById('tax_id_group_cons').style.display = "none";
        }
    }

    function showDivNotify(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id_notify').value = "";
            document.getElementById('tax_id_group_notify').style.display = "block";
        } else {
            document.getElementById('tax_id_group_notify').style.display = "none";
        }
    }

    // function showDivNotifyAll() {
    //     if (document.getElementById('checkBoxNotify').checked) {
    //         // document.getElementById('checkBoxNotify').value = "1";
    //         document.getElementById('notify_party_group').style.display = 'none';
    //     } else {
    //         // document.getElementById('checkBoxNotify').value = "0";
    //         document.getElementById('notify_party_group').style.display = 'block';
    //     }
    // }
    function showDivNotifyAll() {
        if (document.getElementById('checkBoxNotify').checked) {
            document.getElementById('notify_party_group').style.display = 'none';
            document.getElementById('name_notify').value = '';
            document.getElementById('address_notify').value = '';
            document.getElementById('phone_1_notify').value = '';
            document.getElementById('phone_2_notify').value = '';
            document.getElementById('fax_notify').value = '';
            document.getElementById('email_notify').value = '';
            document.getElementById('mandatory_tax_id_notify').value = 1;
            document.getElementById('tax_id_notify').value = '';
        } else {
            document.getElementById('notify_party_group').style.display = 'block';
            document.getElementById('name_notify').value = '';
            document.getElementById('address_notify').value = '';
            document.getElementById('phone_1_notify').value = '';
            document.getElementById('phone_2_notify').value = '';
            document.getElementById('fax_notify').value = '';
            document.getElementById('email_notify').value = '';
            document.getElementById('mandatory_tax_id_notify').value = 1;
            document.getElementById('tax_id_notify').value = '';
        }
    }

    function showDivUndHblAll() {
        if (document.getElementById('checkBoxUndHbl').checked) {
            document.getElementById('und_hbl_group').style.display = 'block';
            document.getElementById('name_und_hbl').value = '';
            document.getElementById('phone_1_und_hbl').value = '';
            document.getElementById('phone_2_und_hbl').value = '';
            document.getElementById('fax_und_hbl').value = '';
            document.getElementById('address_und_hbl').value = '';
            document.getElementById('email_und_hbl').value = '';
            document.getElementById('tax_id_und_hbl').value = '';
        } else {
            document.getElementById('und_hbl_group').style.display = 'none';
            document.getElementById('name_und_hbl').value = '';
            document.getElementById('phone_1_und_hbl').value = '';
            document.getElementById('phone_2_und_hbl').value = '';
            document.getElementById('fax_und_hbl').value = '';
            document.getElementById('address_und_hbl').value = '';
            document.getElementById('email_und_hbl').value = '';
            document.getElementById('mandatory_tax_id_und_hbl').value = '';
            document.getElementById('tax_id_und_hbl').value = '';
        }
    }

    function showDivCommodityHblAll() {
        if (document.getElementById('checkBoxCommodityHbl').checked) {
            document.getElementById('commodity_hbl_group').style.display = 'block';
            document.getElementById('commodity_hbl').value = '';
            document.getElementById('hs_code_hbl').value = '';
            document.getElementById('hbl_type_bl_id').value = '';
        } else {
            document.getElementById('commodity_hbl_group').style.display = 'none';
            document.getElementById('commodity_hbl').value = '';
            document.getElementById('hs_code_hbl').value = '';
            document.getElementById('hbl_type_bl_id').value = '';
        }
    }
</script>
