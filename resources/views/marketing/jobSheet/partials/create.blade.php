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
                                    <li class="nav-item">
                                        <a class="nav-link" id="selling_buying-tab" data-toggle="pill"
                                            href="#selling_buying" role="tab" aria-controls="selling_buying"
                                            aria-selected="false">Selling & Buying</a>
                                    </li>
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
                                                                placeholder="Enter ID Shipper" readonly>
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
                                                                value="{{ old('name_ship') }}""
                                                                placeholder="Enter Name Shipper">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Ship">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_ship" id="phone_1_ship"
                                                                placeholder="Enter Phone 1 Shipper" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Ship">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_ship" id="phone_2_ship"
                                                                placeholder="Enter Phone 2 Shipper" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxShip">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_ship" id="fax_ship"
                                                                placeholder="Enter Fax Shipper" readonly>
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
                                                                placeholder="Enter Address Shipper" readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailShip">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_ship" id="email_ship"
                                                                placeholder="Enter Email Shipper" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdShip">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_ship"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_ship"
                                                                placeholder="Enter Mandatory Tax Shipper" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdShip">Tax ID</label>
                                                            <input type="text" name="tax_id_ship"
                                                                class="form-control form-control-sm" id="tax_id_ship"
                                                                placeholder="Enter Tax ID Shipper" readonly>
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
                                                                placeholder="Enter ID Undername M-BL" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputUndMbl">Undername M-BL / Booking</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_mbl" id="name_und_mbl"
                                                                placeholder="Enter Undername M-BL">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndMbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                placeholder="Enter Phone 1 Undername M-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndMbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_mbl" id="phone_2_und_mbl"
                                                                placeholder="Enter Phone 2 Undername M-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndMbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_mbl" id="fax_und_mbl"
                                                                placeholder="Enter Fax Undername M-BL" readonly>
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
                                                                rows="3" placeholder="Enter Address Undername M-BL" readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndMbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_mbl" id="email_und_mbl"
                                                                placeholder="Enter Email Undername M-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndMbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_mbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_mbl"
                                                                placeholder="Enter Mandatory Tax Undername M-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndMbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="tax_id_und_mbl"
                                                                placeholder="Enter Tax ID Undername M-BL" readonly>
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
                                                                placeholder="Enter ID Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputUndHbl">Undername H-BL / PEB</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_und_hbl" id="name_und_hbl"
                                                                placeholder="Enter Undername H-BL">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1UndHbl">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                placeholder="Enter Phone 1 Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndHbl">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_und_hbl" id="phone_2_und_hbl"
                                                                placeholder="Enter Phone 2 Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndHbl">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_und_hbl" id="fax_und_hbl"
                                                                placeholder="Enter Fax Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndHbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_hbl" id="address_und_hbl"
                                                                rows="3" placeholder="Enter Address Undername H-BL" readonly></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndHbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_hbl" id="email_und_hbl"
                                                                placeholder="Enter Email Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndHbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_hbl"
                                                                class="form-control form-control-sm"
                                                                id="mandatory_tax_id_und_hbl"
                                                                placeholder="Enter Mandatory Tax Undername H-BL" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndHbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="tax_id_und_hbl"
                                                                placeholder="Enter Tax ID Undername H-BL" readonly>
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
                                                                value="{{ old('name_cons') }}"
                                                                placeholder="Enter Consignee">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Cons">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_cons" id="phone_1_cons"
                                                                value="{{ old('phone_1_cons') }}"
                                                                placeholder="Enter Phone 1 Consignee">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Cons">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_cons" id="phone_2_cons"
                                                                value="{{ old('phone_2_cons') }}"
                                                                placeholder="Enter Phone 2 Consignee">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxCons">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_cons" id="fax_cons"
                                                                value="{{ old('fax_cons') }}"
                                                                placeholder="Enter Fax Consignee">
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
                                                                placeholder="Enter Address Consignee">{{ old('address_cons') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailCons">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_cons" id="email_cons"
                                                                value="{{ old('email_cons') }}"
                                                                placeholder="Enter Email Consignee">
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
                                                                value="{{ old('tax_id_cons') }}"
                                                                placeholder="Enter Tax ID Consignee">
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
                                                                id="checkBoxNotify" onclick="showDivNotifyAll()">
                                                            <label for="checkBoxNotify" class="custom-control-label">SAME
                                                                AS CONSIGNEE</label>
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
                                                                value="{{ old('name_notify') }}"
                                                                placeholder="Enter Notify Party">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Notify">Phone 1</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_1_notify" id="phone_1_notify"
                                                                value="{{ old('phone_1_notify') }}"
                                                                placeholder="Enter Phone 1 Notify Party">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Notify">Phone 2</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="phone_2_notify" id="phone_2_notify"
                                                                value="{{ old('phone_2_notify') }}"
                                                                placeholder="Enter Phone 2 Notify Party">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxNotify">Fax</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="fax_notify" id="fax_notify"
                                                                value="{{ old('fax_notify') }}"
                                                                placeholder="Enter Fax Notify Party">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressNotify">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_notify" id="address_notify"
                                                                rows="3" placeholder="Enter Address Notify Party">{{ old('address_notify') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailNotify">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_notify" id="email_notify"
                                                                value="{{ old('email_notify') }}"
                                                                placeholder="Enter Email Notify Party">
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
                                                                value="{{ old('tax_id_notify') }}"
                                                                placeholder="Enter Tax ID Notify Party">
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
                                                                value="{{ old('carrier') }}" placeholder="Enter Carrier">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputVessel">Vessel / Voyage</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="vessel" id="vessel"
                                                                value="{{ old('vessel') }}" placeholder="Enter Vessel">
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
                                                                value="{{ old('pol') }}"
                                                                placeholder="Enter Port Of Loading">
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
                                                                value="{{ old('pod') }}"
                                                                placeholder="Enter Port Of Discharge">
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
                                                                value="{{ old('volume') }}" placeholder="Enter Volume">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mr-5">
                                                        <div class="form-group">
                                                            <label for="inputNameContSizeType">Size / Type
                                                                Container</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_cont_size_type" id="name_cont_size_type"
                                                                placeholder="Enter Size / Type Container">
                                                        </div>
                                                    </div>

                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="inputQty">Quantity</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="qty" id="qty"
                                                                value="{{ old('qty') }}" placeholder="Enter Qty">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputNameTypePack">Type Pack</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="name_type_pack" id="name_type_pack"
                                                                placeholder="Enter Type Packaging">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <input type="hidden"
                                                                    class="form-control form-control-sm text-uppercase"
                                                                    name="cont_size_type_id" id="cont_size_type_id"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-1">
                                                            <div class="form-group">
                                                                <input type="hidden"
                                                                    class="form-control form-control-sm text-uppercase"
                                                                    name="type_packaging_id" id="type_packaging_id"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputGrossWeight">Gross Weight</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="gross_weight" id="gross_weight"
                                                                value="{{ old('gross_weight') }}"
                                                                placeholder="Enter Gross Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mr-4">
                                                        <div class="form-group">
                                                            <label for="typeWeight">Type</label>
                                                            <select name="gross_type_weight_id" id="gross_type_weight_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typeWeight as $item)
                                                                    <option
                                                                        value="{{ old('gross_type_weight_id', $item->id) }}">
                                                                        {{ $item->code_weight }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputNetWeight">Net Weight</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="net_weight" id="net_weight"
                                                                value="{{ old('net_weight') }}"
                                                                placeholder="Enter Net Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mr-4">
                                                        <div class="form-group">
                                                            <label for="typeWeight">Type</label>
                                                            <select name="net_type_weight_id" id="net_type_weight_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typeWeight as $item)
                                                                    <option
                                                                        value="{{ old('net_type_weight_id', $item->id) }}">
                                                                        {{ $item->code_weight }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputMeasurement">Measurement</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="measurement" id="measurement"
                                                                value="{{ old('measurement') }}"
                                                                placeholder="Enter Measurement">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="typeMeasurement">Type</label>
                                                            <select name="type_measurement_id" id="type_measurement_id"
                                                                class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                @foreach ($typeMeasurement as $item)
                                                                    <option
                                                                        value="{{ old('type_measurement_id', $item->id) }}">
                                                                        {{ $item->code_measurement }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">

                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityMbl">Commodity M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="commodity_mbl" id="commodity_mbl"
                                                                value="{{ old('commodity_mbl') }}"
                                                                placeholder="Enter Commodity M-B/L">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeMbl">HS Code M-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_mbl" id="hs_code_mbl"
                                                                value="{{ old('hs_code_mbl') }}"
                                                                placeholder="Enter HS Code M-B/L">
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

                                                    {{-- <div class="col-3">
                                                        <div class="form-group">
                                                            <label>B/L Delivery</label>
                                                            <select class="form-control form-control-sm mb-2 select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>EMAIL
                                                                </option>
                                                                <option>HARD COPY BY COURIER
                                                                </option>
                                                                <option>TELEX
                                                                </option>
                                                                <option>OTHER
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputBlDeliveryDesc">Enter Email Or
                                                                Other</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="bl_delivery_desc" id="bl_delivery_desc"
                                                                placeholder="Enter B/L Delivery Desc">
                                                        </div>
                                                    </div> --}}

                                                </div>
                                            </div>

                                            {{-- <div class="container">
                                                <div class="row">
                                                    <div class="col-2 offset-md-5">
                                                        <div class="form-group">
                                                            <label for="inputIssueLoc">Issue Location</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="issue_loc" id="issue_loc"
                                                                placeholder="Enter Issue Location">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityHbl">Commodity H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="commodity_hbl" id="commodity_hbl"
                                                                value="{{ old('commodity_hbl') }}"
                                                                placeholder="Enter Commodity H-B/L">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputHsCodeHbl">HS Code H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm mb-2 text-uppercase"
                                                                name="hs_code_hbl" id="hs_code_hbl"
                                                                value="{{ old('hs_code_hbl') }}"
                                                                placeholder="Enter HS Code H-B/L">
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
                                                                rows="3" placeholder="Enter Stuffing Address">{{ old('stuffing_address') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicName">PIC Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_name" id="pic_name"
                                                                value="{{ old('pic_name') }}"
                                                                placeholder="Enter PIC Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicPhone">PIC Phone</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_phone" id="pic_phone"
                                                                value="{{ old('pic_phone') }}"
                                                                placeholder="Enter PIC Phone">
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
                                                                value="{{ old('top') }}"
                                                                placeholder="Enter Terms Of Payment">
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
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputRemarks">Remarks</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="5"
                                                                placeholder="Enter Remarks">{{ old('remarks') }}</textarea>
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
                                                            <label for="inputStatus">Status</label>
                                                            <input type="text"
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
                                                    id="user_id" value="{{ Auth::user()->id }}" placeholder="">

                                                <div class="d-grid gap-2 d-md-block mt-5">
                                                    <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                                    <a href="#" class="btn btn-danger" type="button">CANCEL</a>
                                                </div>
                                            </div>
                                            <!-- End Button Save -->

                                        </div>
                                        <!-- tab end description -->

                                        <!-- tab start selling & buying -->
                                        <div class="tab-pane fade" id="selling_buying" role="tabpanel"
                                            aria-labelledby="selling_buying-tab">
                                            <!-- start selling -->
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <H5><strong>Revenue Of Sales / Ocean Freight</strong></H5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md">
                                                        <p><strong>Selling Rate</strong></p>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group row">
                                                            <label for="inputShipper">Exchange Rate</label>
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control form-control-sm text-uppercase"
                                                                    name="undername" id="undername" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group row">
                                                            <label>Issue Date</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date" id="issue_date"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm datetimepicker-input"
                                                                        data-target="#issue_date" />
                                                                    <div class="input-group-append"
                                                                        data-target="#issue_date"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group row">
                                                            <label>Due Date</label>
                                                            <div class="col-md-6">
                                                                <div class="input-group date" id="due_date"
                                                                    data-target-input="nearest">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm datetimepicker-input"
                                                                        data-target="#due_date" />
                                                                    <div class="input-group-append"
                                                                        data-target="#due_date"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="formOceanFreight_SellingRate"
                                                    name="formOceanFreight_SellingRateName[0]">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>OCEAN FREIGHT ALL IN
                                                                </option>
                                                                <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                                                                </option>
                                                                <option>UNDERNAME
                                                                </option>
                                                                <option>LATE PAYMENT
                                                                </option>
                                                                <option>SEAL FEE
                                                                </option>
                                                                <option>TELEX / SWB FEE
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">X</p>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>USD
                                                                </option>
                                                                <option>IDR
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="input#" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="text" class="form-control" placeholder=""
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="add_input_ocean_freight">

                                                </div>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-0 mr-2">
                                                            <button class="btn btn-sm btn-success" type="button"
                                                                id="addButtonOceanFreight">
                                                                <i class="fas fa-plus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-0">
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                id="removeButtonOceanFreight">
                                                                <i class="fas fa-minus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        REVENUE</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        REVENUE
                                                        IN IDR</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" readonly>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="row mt-5">
                                                    <div class="col-6">
                                                        <H5><strong>Revenue Of Sales / EMKL</strong></H5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><strong>Selling Rate</strong></p>
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="formEmkl_SellingRate"
                                                    name="formEmkl_SellingRateName[0]">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>OCEAN FREIGHT ALL IN
                                                                </option>
                                                                <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                                                                </option>
                                                                <option>UNDERNAME
                                                                </option>
                                                                <option>LATE PAYMENT
                                                                </option>
                                                                <option>SEAL FEE
                                                                </option>
                                                                <option>TELEX / SWB FEE
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0 mr-2">
                                                        <p style="text-align: center">X</p>
                                                    </div>
                                                    <div class="col-sm-0 mr-4">
                                                        <p style="text-align: center">VOLUME</p>
                                                    </div>

                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="add_input_emkl">

                                                </div>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-0 mr-2">
                                                            <button class="btn btn-sm btn-success" type="button"
                                                                id="addButtonEmkl">
                                                                <i class="fas fa-plus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-0">
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                id="removeButtonEmkl">
                                                                <i class="fas fa-minus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        REVENUE</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        SELLING RATE</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">PPN
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">TOTAL +
                                                        VAT
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">PPH23
                                                        2%</label>
                                                    <div class="col-md-2 offset-md-7">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword"
                                                        class="col-sm-4 col-form-label">GRANDTOTAL
                                                        SELLING RATE</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <!-- end selling -->

                                            <!-- start buying -->
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <H5><strong>Cost Of Sales</strong></H5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><strong>Buying Rate</strong></p>
                                                    </div>
                                                    <div class="col-md-4 offset-md-3">
                                                        <div class="form-group row">
                                                            <label for="inputShipper">Exchange Rate</label>
                                                            <div class="col-md-4">
                                                                <input type="text"
                                                                    class="form-control form-control-sm text-uppercase"
                                                                    name="undername" id="undername" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="formCostOfSales_BuyingRate"
                                                    name="formCostOfSales_BuyingRateName[0]">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>OCEAN FREIGHT ALL IN
                                                                </option>
                                                                <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                                                                </option>
                                                                <option>UNDERNAME
                                                                </option>
                                                                <option>LATE PAYMENT
                                                                </option>
                                                                <option>SEAL FEE
                                                                </option>
                                                                <option>TELEX / SWB FEE
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">X</p>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>USD
                                                                </option>
                                                                <option>IDR
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="input#" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="text" class="form-control" placeholder=""
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="add_input_cost_of_sales">

                                                </div>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-0 mr-2">
                                                            <button class="btn btn-sm btn-success" type="button"
                                                                id="addButtonCostOfSales">
                                                                <i class="fas fa-plus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-0">
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                id="removeButtonCostOfSales">
                                                                <i class="fas fa-minus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        COST</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        COST
                                                        IN IDR</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" readonly>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="row mt-5">
                                                    <div class="col-6">
                                                        <H5><strong>Cost Of Sales (Handling)</strong></H5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><strong>Buying Rate</strong></p>
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="formCostOfSales_BuyingRate"
                                                    name="formCostOfSales_BuyingRateName[0]">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>OCEAN FREIGHT ALL IN
                                                                </option>
                                                                <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                                                                </option>
                                                                <option>UNDERNAME
                                                                </option>
                                                                <option>LATE PAYMENT
                                                                </option>
                                                                <option>SEAL FEE
                                                                </option>
                                                                <option>TELEX / SWB FEE
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0 mr-2">
                                                        <p style="text-align: center">X</p>
                                                    </div>
                                                    <div class="col-sm-0 mr-4">
                                                        <p style="text-align: center">VOLUME</p>
                                                    </div>

                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="add_input_handling">

                                                </div>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-0 mr-2">
                                                            <button class="btn btn-sm btn-success" type="button"
                                                                id="addButtonHandling">
                                                                <i class="fas fa-plus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-0">
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                id="removeButtonHandling">
                                                                <i class="fas fa-minus nav-icon"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        COST HANDLING</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="form-group row mt-5">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        BUYING RATE</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">PPN
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">TOTAL +
                                                        VAT
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">PPH23
                                                        2%</label>
                                                    <div class="col-md-2 offset-md-7">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword"
                                                        class="col-sm-4 col-form-label">GRANDTOTAL
                                                        BUYING RATE</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <!-- end buying -->

                                            <!-- start Grandtotal -->
                                            <div class="container mt-5">
                                                <div class="form-group row">
                                                    <label for="inputPassword"
                                                        class="col-sm-4 col-form-label">GRANDTOTAL</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <!-- end Grandtotal -->

                                            <!-- start Grandtotal -->
                                            <div class="container mt-5">
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">PROFIT /
                                                        LOSS</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <!-- end Grandtotal -->

                                            <!-- Start Button Save -->
                                            <div class="container">
                                                <!-- Hidden User -->
                                                <input type="hidden" class="form-control form-control-sm"
                                                    name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                                                    placeholder="">

                                                <div class="d-grid gap-2 d-md-block mt-5">
                                                    <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                                    <a href="#" class="btn btn-danger" type="button">CANCEL</a>
                                                </div>
                                            </div>
                                            <!-- End Button Save -->

                                        </div>
                                        <!-- tab end selling & buying -->
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

    function showDivNotifyAll() {
        if (document.getElementById('checkBoxNotify').checked) {
            document.getElementById('notify_party_group').style.display = 'none';
        } else {
            document.getElementById('notify_party_group').style.display = 'block';
        }
    }
</script>
