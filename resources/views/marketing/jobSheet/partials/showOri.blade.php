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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputCodeJobSheet">Code Job Sheet</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="code_js" id="code_js"
                                                                value="{{ $jobSheetHead->code_js }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputBookingNo">Booking No.</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="booking_no" id="booking_no"
                                                                value="{{ $jobSheetHead->booking_no }}" disabled>
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
                                                                name="shipper_id" id="shipper_id"
                                                                value="{{ $jobSheetHead->shipper_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputShipper">Shipper</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_ship" id="name_ship"
                                                                value="{{ $jobSheetHead->shipper['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Ship">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_ship" id="phone_1_ship"
                                                                value="{{ $jobSheetHead->shipper['phone_1'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Ship">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_ship" id="phone_2_ship"
                                                                value="{{ $jobSheetHead->shipper['phone_2'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxShip">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_ship" id="fax_ship"
                                                                value="{{ $jobSheetHead->shipper['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressShip">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_ship" id="address_ship" rows="3"
                                                                readonly>{{ $jobSheetHead->shipper['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailShip">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_ship" id="email_ship"
                                                                value="{{ $jobSheetHead->shipper['email'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdShip">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_ship"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_ship"
                                                                value="{{ $jobSheetHead->shipper['mandatory_tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdShip">Tax ID</label>
                                                            <input type="text" name="tax_id_ship"
                                                                class="form-control form-control-sm" id="tax_id_ship"
                                                                value="{{ $jobSheetHead->shipper['tax_id'] }}" readonly>
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
                                                                name="undername_mbl_id" id="undername_mbl_id"
                                                                value="{{ $jobSheetHead->undername_mbl_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputUndMbl">M-BL / Booking</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_mbl" id="name_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['name'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndMbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['phone_1'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndMbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_mbl" id="phone_2_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['phone_2'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndMbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_mbl" id="fax_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndMbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_mbl" id="address_und_mbl"
                                                                rows="3" readonly>{{ $jobSheetHead->undernameMbl['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndMbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_mbl" id="email_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['email'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndMbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_mbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['mandatory_tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndMbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="tax_id_und_mbl"
                                                                value="{{ $jobSheetHead->undernameMbl['tax_id'] }}"
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
                                                                name="undername_hbl_id" id="undername_hbl_id"
                                                                value="{{ $jobSheetHead->undername_hbl_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container" id="und_hbl_group">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputUndHbl">H-BL / PEB</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_hbl" id="name_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['name'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndHbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                value="{{ $jobSheetHead->undernameHbl['phone_1'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndHbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_hbl" id="phone_2_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['phone_2'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndHbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_hbl" id="fax_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['fax'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndHbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_hbl" id="address_und_hbl"
                                                                rows="3" readonly>{{ $jobSheetHead->undernameHbl['address'] }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndHbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_hbl" id="email_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['email'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndHbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_hbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['mandatory_tax_id'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndHbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="tax_id_und_hbl"
                                                                value="{{ $jobSheetHead->undernameHbl['tax_id'] }}"
                                                                readonly>
                                                        </div>
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
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputConsignee">Consignee</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cons" id="name_cons"
                                                                value="{{ $jobSheetHead->name_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Cons">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_cons" id="phone_1_cons"
                                                                value="{{ $jobSheetHead->phone_1_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Cons">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_cons" id="phone_2_cons"
                                                                value="{{ $jobSheetHead->phone_2_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxCons">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_cons" id="fax_cons"
                                                                value="{{ $jobSheetHead->fax_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressCons">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_cons" id="address_cons" rows="3"
                                                                readonly>{{ $jobSheetHead->address_cons }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailCons">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_cons" id="email_cons"
                                                                value="{{ $jobSheetHead->email_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="mandatory_tax_cons">Mandatory Tax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="mandatory_tax_id_cons" id="mandatory_tax_id_cons"
                                                                value="{{ $jobSheetHead->mandatory_tax_id_cons }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_cons">
                                                            <label for="inputTaxIdCons">Tax ID</label>
                                                            <input type="text" name="tax_id_cons"
                                                                class="form-control form-control-sm" id="tax_id_cons"
                                                                value="{{ $jobSheetHead->tax_id_cons }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container" id="notify_party_group">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputNotifyParty">Notify Party</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_notify" id="name_notify"
                                                                value="{{ $jobSheetHead->name_notify }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Notify">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_notify" id="phone_1_notify"
                                                                value="{{ $jobSheetHead->phone_1_notify }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Notify">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_notify" id="phone_2_notify"
                                                                value="{{ $jobSheetHead->phone_2_notify }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxNotify">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_notify" id="fax_notify"
                                                                value="{{ $jobSheetHead->fax_notify }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressNotify">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_notify" id="address_notify"
                                                                rows="3" readonly>{{ $jobSheetHead->address_notify }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailNotify">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_notify" id="email_notify"
                                                                value="{{ $jobSheetHead->email_notify }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="mandatoryTaxNotify">Mandatory Tax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="mandatory_tax_id_notify"
                                                                id="mandatory_tax_id_notify"
                                                                value="{{ $jobSheetHead->mandatory_tax_id_notify }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_notify">
                                                            <label for="inputTaxIdNotify">Tax ID</label>
                                                            <input type="text" name="tax_id_notify"
                                                                class="form-control form-control-sm" id="tax_id_notify"
                                                                value="{{ $jobSheetHead->tax_id_notify }}" readonly>
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
                                        <div class="tab-pane fade" id="schedule" role="tabpanel"
                                            aria-labelledby="schedule-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCarrier">Carrier</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="carrier" id="carrier"
                                                                value="{{ $jobSheetHead->carrier }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputVessel">Vessel / Voyage</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="vessel" id="vessel"
                                                                value="{{ $jobSheetHead->vessel }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>ETD :</label>
                                                            <div class="input-group date" id="etd"
                                                                data-target-input="nearest">
                                                                <input type="text" name="etd"
                                                                    value="{{ $jobSheetHead->etd }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#etd" disabled />
                                                                <div class="input-group-append" data-target="#etd"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputPol">Port Of Loading</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pol" id="pol"
                                                                value="{{ $jobSheetHead->pol }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputPod">Port Of Discharge</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pod" id="pod"
                                                                value="{{ $jobSheetHead->pod }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Open CY :</label>
                                                            <div class="input-group date" id="open_cy"
                                                                data-target-input="nearest">
                                                                <input type="text" name="open_cy"
                                                                    value="{{ $jobSheetHead->open_cy }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#open_cy" disabled />
                                                                <div class="input-group-append" data-target="#open_cy"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Closing Document :</label>
                                                            <div class="input-group date" id="closing_doc"
                                                                data-target-input="nearest">
                                                                <input type="text" name="closing_doc"
                                                                    value="{{ $jobSheetHead->closing_doc }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#closing_doc" disabled />
                                                                <div class="input-group-append" data-target="#closing_doc"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Closing CY :</label>
                                                            <div class="input-group date" id="closing_cy"
                                                                data-target-input="nearest">
                                                                <input type="text" name="closing_cy"
                                                                    value="{{ $jobSheetHead->closing_cy }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#closing_cy" disabled />
                                                                <div class="input-group-append" data-target="#closing_cy"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end schedule -->

                                        <!-- tab start description -->
                                        <div class="tab-pane fade" id="description" role="tabpanel"
                                            aria-labelledby="description-tab">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="inputVolume">Volume</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="volume" id="volume"
                                                                value="{{ $jobSheetHead->volume }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mr-5">
                                                        <div class="form-group">
                                                            <label for="inputNameContSizeType">Size / Type
                                                                Container</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cont_size_type" id="name_cont_size_type"
                                                                value="{{ $jobSheetHead->containerSizeType['name'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="inputQty">Quantity</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="qty" id="qty"
                                                                value="{{ $jobSheetHead->qty }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputNameTypePack">Type Pack</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_type_pack" id="name_type_pack" value="{{ $jobSheetHead->typePack['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="cont_size_type_id" id="cont_size_type_id" value="{{ $jobSheetHead->cont_size_type_id }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="type_packaging_id" id="type_packaging_id" value="{{ $jobSheetHead->type_packaging_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityMbl">Commodity M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="commodity_mbl" id="commodity_mbl"
                                                                value="{{ $jobSheetHead->commodity_mbl }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeMbl">HS Code M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_mbl" id="hs_code_mbl"
                                                                value="{{ $jobSheetHead->hs_code_mbl }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="typeBillOfLadingMbl">M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="mbl_type_bl_id" id="mbl_type_bl_id"
                                                                value="{{ $jobSheetHead->mbl_type_bl_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                name="use_commodity_hbl" id="checkBoxCommodityHbl"
                                                                onclick="showDivCommodityHblAll()">
                                                            <label for="checkBoxCommodityHbl"
                                                                class="custom-control-label">Use
                                                                Commodity H-BL</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="container" id="commodity_hbl_group">
                                                <div class="row mt-3">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityHbl">Commodity H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="commodity_hbl" id="commodity_hbl"
                                                                value="{{ $jobSheetHead->commodity_hbl }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeHbl">HS Code H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_hbl" id="hs_code_hbl"
                                                                value="{{ $jobSheetHead->hs_code_hbl }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="typeBillOfLadingHbl">H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hbl_type_bl_id" id="hbl_type_bl_id"
                                                                value="{{ $jobSheetHead->hbl_type_bl_id }}" readonly>
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
                                                            <div class="input-group date" id="stuffing_date"
                                                                data-target-input="nearest">
                                                                <input type="text" name="stuffing_date"
                                                                    value="{{ $jobSheetHead->stuffing_date }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#stuffing_date" disabled/>
                                                                <div class="input-group-append"
                                                                    data-target="#stuffing_date"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputStuffingAddress">Stuffing
                                                                Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="stuffing_address" id="stuffing_address"
                                                                rows="3" readonly>{{ $jobSheetHead->stuffing_address }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicName">PIC Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_name" id="pic_name"
                                                                value="{{ $jobSheetHead->pic_name }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicPhone">PIC Phone</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_phone" id="pic_phone"
                                                                value="{{ $jobSheetHead->pic_phone }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputTermOfPayment">Term Of Payment</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="top" id="top"
                                                                value="{{ $jobSheetHead->top }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="freightCharges">Freight & Charges</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="type_payment_id" id="type_payment_id"
                                                                value="{{ $jobSheetHead->type_payment_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputRemarks">Remarks</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="5" readonly>{{ $jobSheetHead->remarks }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputSiDoc">File Shipping
                                                                Instruction</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="si_doc" name="si_doc" value="{{ $jobSheetHead->si_doc }}" disabled>
                                                                    <label class="custom-file-label" for="si_doc">{{ $jobSheetHead->si_doc }}</label>
                                                                </div>
                                                                {{-- <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 ml-5">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="status" id="status" value="{{ $jobSheetHead->status }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 ml-5">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="user_name" id="user_name" value="{{ $jobSheetHead->user['name'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 ml-5">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="user_id" id="user_id" value="{{ $jobSheetHead->user_id }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <!-- Start Button Save -->
                                            <div class="container">
                                                <!-- Hidden User -->
                                                <input type="hidden" class="form-control form-control-sm" name="user_id"
                                                    id="user_id" value="{{ Auth::user()->id }}">

                                                <div class="d-grid gap-2 d-md-block mt-5">
                                                    <button class="btn btn-primary mr-3" type="submit">SAVE</button>
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
