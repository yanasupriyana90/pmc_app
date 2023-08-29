@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
@section('subtitle_2', 'Add Data')

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
                            <form action="{{ Route('jobSheet.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                                                value="{{ 'JS-' . date('mdy') . '-' . $kd }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputBookingNo">Booking No.</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="booking_no" id="booking_no"
                                                                value="{{ old('booking_no') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputSalesName">Sales Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="sales_name" id="sales_name"
                                                                value="{{ Auth::user()->name }}" readonly>
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
                                                                name="shipper_id" id="shipper_id" readonly>
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
                                                                value="{{ old('name_ship') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Ship">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_ship" id="phone_1_ship" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Ship">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_ship" id="phone_2_ship" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxShip">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_ship" id="fax_ship" readonly>
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
                                                                readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailShip">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_ship" id="email_ship" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdShip">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_ship"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_ship" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdShip">Tax ID</label>
                                                            <input type="text" name="tax_id_ship"
                                                                class="form-control form-control-sm" id="tax_id_ship"
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
                                                                name="undername_mbl_id" id="undername_mbl_id" readonly>
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
                                                                name="name_und_mbl" id="name_und_mbl">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndMbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndMbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_mbl" id="phone_2_und_mbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndMbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_mbl" id="fax_und_mbl" readonly>
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
                                                                rows="3" readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndMbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_mbl" id="email_und_mbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndMbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_mbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_mbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndMbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="tax_id_und_mbl"
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
                                                                name="undername_hbl_id" id="undername_hbl_id" readonly>
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
                                            <div class="container" id="und_hbl_group" style="display: none;">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputUndHbl">H-BL / PEB</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_hbl" id="name_und_hbl">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndHbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndHbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_hbl" id="phone_2_und_hbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndHbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_hbl" id="fax_und_hbl" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndHbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_hbl" id="address_und_hbl"
                                                                rows="3" readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndHbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_hbl" id="email_und_hbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndHbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_hbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_hbl" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndHbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="tax_id_und_hbl"
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
                                                                value="{{ old('name_cons') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Cons">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_cons" id="phone_1_cons"
                                                                value="{{ old('phone_1_cons') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Cons">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_cons" id="phone_2_cons"
                                                                value="{{ old('phone_2_cons') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxCons">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_cons" id="fax_cons"
                                                                value="{{ old('fax_cons') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressCons">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_cons" id="address_cons" rows="3">{{ old('address_cons') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailCons">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_cons" id="email_cons"
                                                                value="{{ old('email_cons') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="mandatory_tax_cons">Mandatory Tax</label>
                                                            <select name="mandatory_tax_id_cons"
                                                                id="mandatory_tax_id_cons"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;" onchange="showDivCons(this)">
                                                                @foreach ($mandatoryTax as $item)
                                                                    <option
                                                                        value="{{ old('mandatory_tax_id_cons', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_cons"
                                                            style="display: none;">
                                                            <label for="inputTaxIdCons">Tax ID</label>
                                                            <input type="text" name="tax_id_cons"
                                                                class="form-control form-control-sm" id="tax_id_cons"
                                                                value="{{ old('tax_id_cons') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
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
                                                                name="same_as_consignee_input" id="checkBoxNotifyInput" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container" id="notify_party_group">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputNotifyParty">Notify Party</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_notify" id="name_notify"
                                                                value="{{ old('name_notify') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Notify">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_notify" id="phone_1_notify"
                                                                value="{{ old('phone_1_notify') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Notify">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_notify" id="phone_2_notify"
                                                                value="{{ old('phone_2_notify') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxNotify">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_notify" id="fax_notify"
                                                                value="{{ old('fax_notify') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressNotify">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_notify" id="address_notify"
                                                                rows="3">{{ old('address_notify') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailNotify">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_notify" id="email_notify"
                                                                value="{{ old('email_notify') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="mandatoryTaxNotify">Mandatory Tax</label>
                                                            <select name="mandatory_tax_id_notify"
                                                                id="mandatory_tax_id_notify"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;" onchange="showDivNotify(this)">
                                                                @foreach ($mandatoryTax as $item)
                                                                    <option
                                                                        value="{{ old('mandatory_tax_id_notify', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group" id="tax_id_group_notify"
                                                            style="display: none;">
                                                            <label for="inputTaxIdNotify">Tax ID</label>
                                                            <input type="text" name="tax_id_notify"
                                                                class="form-control form-control-sm" id="tax_id_notify"
                                                                value="{{ old('tax_id_notify') }}">
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
                                                                value="{{ old('carrier') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputVessel">Vessel / Voyage</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="vessel" id="vessel"
                                                                value="{{ old('vessel') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>ETD :</label>
                                                            <div class="input-group date" id="etd"
                                                                data-target-input="nearest">
                                                                <input type="text" name="etd"
                                                                    value="{{ old('etd') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#etd" />
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
                                                                value="{{ old('pol') }}">
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
                                                                value="{{ old('pod') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Open CY :</label>
                                                            <div class="input-group date" id="open_cy"
                                                                data-target-input="nearest">
                                                                <input type="text" name="open_cy"
                                                                    value="{{ old('open_cy') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#open_cy" />
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
                                                                    value="{{ old('closing_doc') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#closing_doc" />
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
                                                                    value="{{ old('closing_cy') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#closing_cy" />
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
                                                                value="{{ old('volume') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mr-5">
                                                        <div class="form-group">
                                                            <label for="inputNameContSizeType">Size / Type
                                                                Container</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cont_size_type" id="name_cont_size_type">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="inputQty">Quantity</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="qty" id="qty"
                                                                value="{{ old('qty') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputNameTypePack">Type Pack</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_type_pack" id="name_type_pack">
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
                                                                        <table id="tableContSeal" class="table table-bordered text-center">
                                                                            <tr>
                                                                                <th class="text text-center" width="3%">
                                                                                    No.</th>
                                                                                <th class="text">
                                                                                    Container No.</th>
                                                                                <th class="text">
                                                                                    Seal No.</th>

                                                                                <th class="text" width="7%"
                                                                                    rowspan="2"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text text-center"><span
                                                                                        id="cont_seal_no">1</span></td>
                                                                                <td><input type="text" name="contName[]"
                                                                                        id="contName1"
                                                                                        class="form-control form-control-sm input-sm text-uppercase" value="{{ old('contName') }}"/>
                                                                                </td>
                                                                                <td><input type="text" name="sealName[]"
                                                                                        id="sealName1"
                                                                                        class="form-control form-control-sm input-sm text-uppercase" value="{{ old('sealName') }}"/>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <div align="right">
                                                                            <button type="button" name="add_row_cont_seal"
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
                                                                        {{-- <input type="submit" name="create_invoice"
                                                                            id="create_invoice" class="btn btn-info"
                                                                            value="Create" /> --}}
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
                                                                name="cont_size_type_id" id="cont_size_type_id" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="type_packaging_id" id="type_packaging_id" readonly>
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
                                                                value="{{ old('commodity_mbl') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeMbl">HS Code M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_mbl" id="hs_code_mbl"
                                                                value="{{ old('hs_code_mbl') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="typeBillOfLadingMbl">M-B/L</label>
                                                            <select name="mbl_type_bl_id" id="mbl_type_bl_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typeBillOfLading as $item)
                                                                    <option
                                                                        value="{{ old('mbl_type_bl_id', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
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
                                                            <label for="checkBoxCommodityHbl"
                                                                class="custom-control-label">Use
                                                                Commodity H-BL</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container" id="commodity_hbl_group" style="display: none;">
                                                <div class="row mt-3">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityHbl">Commodity H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="commodity_hbl" id="commodity_hbl"
                                                                value="{{ old('commodity_hbl') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeHbl">HS Code H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_hbl" id="hs_code_hbl"
                                                                value="{{ old('hs_code_hbl') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="typeBillOfLadingHbl">H-B/L</label>
                                                            <select name="hbl_type_bl_id" id="hbl_type_bl_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typeBillOfLading as $item)
                                                                    <option
                                                                        value="{{ old('hbl_type_bl_id', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
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
                                                            <div class="input-group date" id="stuffing_date"
                                                                data-target-input="nearest">
                                                                <input type="text" name="stuffing_date"
                                                                    value="{{ old('stuffing_date') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#stuffing_date" />
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
                                                                rows="3">{{ old('stuffing_address') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicName">PIC Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_name" id="pic_name"
                                                                value="{{ old('pic_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicPhone">PIC Phone</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_phone" id="pic_phone"
                                                                value="{{ old('pic_phone') }}">
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
                                                                value="{{ old('top') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="freightCharges">Freight & Charges</label>
                                                            <select name="type_payment_id" id="type_payment_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typePayment as $item)
                                                                    <option
                                                                        value="{{ old('type_payment_id', $item->id) }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Due Date Invoice :</label>
                                                            <div class="input-group date" id="due_date_inv"
                                                                data-target-input="nearest">
                                                                <input type="text" name="due_date_inv"
                                                                    value="{{ old('due_date_inv') }}"
                                                                    class="form-control form-control-sm datetimepicker-input"
                                                                    data-target="#due_date_inv" />
                                                                <div class="input-group-append"
                                                                    data-target="#due_date_inv"
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
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputRemarks">Remarks</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="5">{{ old('remarks') }}</textarea>
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
                                                                        id="si_doc" name="si_doc">
                                                                    <label class="custom-file-label" for="si_doc">Choose
                                                                        file</label>
                                                                </div>
                                                                {{-- <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div> --}}
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

    @section('scriptCreateJobsheet')

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
                    html_code += '<td class="text text-center"><span id="cont_seal_no">' + count + '</span></td>';

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
                $('#checkBoxNotify').on('change', function(){
                    this.value = this.checked ? 1 : 0;
                    $('#checkBoxNotifyInput').val(this.value);
                }).change();
            });
        </script>
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
        } else {
            document.getElementById('und_hbl_group').style.display = 'none';
        }
    }

    function showDivCommodityHblAll() {
        if (document.getElementById('checkBoxCommodityHbl').checked) {
            document.getElementById('commodity_hbl_group').style.display = 'block';
        } else {
            document.getElementById('commodity_hbl_group').style.display = 'none';
        }
    }
</script>
