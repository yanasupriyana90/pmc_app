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
                            <form action="{{ Route('jobSheet.store') }}" method="POST">
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
                                                                name="code_jb" id="code_jb"
                                                                value="{{ 'JB-' . date('dmy') . '-' . $kd }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="inputBookingNo">Booking No.</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="booking_no" id="booking_no">
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
                                                                placeholder="Enter ID Shipper" disabled>
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
                                                                placeholder="Enter Name Shipper">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Ship">Phone 1</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_1_ship" id="phone_1_ship"
                                                                placeholder="Enter Phone 1 Shipper" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Ship">Phone 2</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_2_ship" id="phone_2_ship"
                                                                placeholder="Enter Phone 2 Shipper" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxShip">Fax</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="fax_ship" id="fax_ship"
                                                                placeholder="Enter Fax Shipper" disabled>
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
                                                                placeholder="Enter Address Shipper" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailShip">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_ship" id="email_ship"
                                                                placeholder="Enter Email Shipper" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdShip">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_ship"
                                                                class="form-control form-control-sm" id="mandatory_tax_id_ship"
                                                                placeholder="Enter Mandatory Tax Shipper" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdShip">Tax ID</label>
                                                            <input type="text" name="tax_id_ship"
                                                                class="form-control form-control-sm" id="tax_id_ship"
                                                                placeholder="Enter Tax ID Shipper" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="undername_mbl_id" id="undername_mbl_id"
                                                                placeholder="Enter ID Undername M-BL" disabled>
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
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                placeholder="Enter Phone 1 Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndMbl">Phone 2</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_2_und_mbl" id="phone_2_und_mbl"
                                                                placeholder="Enter Phone 2 Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndMbl">Fax</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="fax_und_mbl" id="fax_und_mbl"
                                                                placeholder="Enter Fax Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndMbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_mbl" id="address_und_mbl" rows="3"
                                                                placeholder="Enter Address Undername M-BL" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndMbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_mbl" id="email_und_mbl"
                                                                placeholder="Enter Email Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndMbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="mandatory_tax_id_und_mbl"
                                                                placeholder="Enter Mandatory Tax Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndMbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_mbl"
                                                                class="form-control form-control-sm" id="tax_id_und_mbl"
                                                                placeholder="Enter Tax ID Undername M-BL" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="undername_hbl_id" id="undername_hbl_id"
                                                                placeholder="Enter ID Undername H-BL" disabled>
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
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_1_und_mbl" id="phone_1_und_mbl"
                                                                placeholder="Enter Phone 1 Undername H-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2UndHbl">Phone 2</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_2_und_hbl" id="phone_2_und_hbl"
                                                                placeholder="Enter Phone 2 Undername H-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxUndHbl">Fax</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="fax_und_hbl" id="fax_und_hbl"
                                                                placeholder="Enter Fax Undername H-BL" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="inputAddressUndHbl">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_und_hbl" id="address_und_hbl" rows="3"
                                                                placeholder="Enter Address Undername H-BL" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailUndHbl">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_und_hbl" id="email_und_hbl"
                                                                placeholder="Enter Email Undername H-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 offset-1">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxIdUndHbl">Mandatory Tax</label>
                                                            <input type="text" name="mandatory_tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="mandatory_tax_id_und_hbl"
                                                                placeholder="Enter Mandatory Tax Undername H-BL" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputTaxIdUndHbl">Tax ID</label>
                                                            <input type="text" name="tax_id_und_hbl"
                                                                class="form-control form-control-sm" id="tax_id_und_hbl"
                                                                placeholder="Enter Tax ID Undername H-BL" disabled>
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
                                                                name="consignee_id" id="consignee_id"
                                                                placeholder="Enter Consignee">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Cons">Phone 1</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_1_cons" id="phone_1_cons"
                                                                placeholder="Enter Phone 1 Consignee" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Cons">Phone 2</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_2_cons" id="phone_2_cons"
                                                                placeholder="Enter Phone 2 Consignee" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxCons">Fax</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="fax_cons" id="fax_cons"
                                                                placeholder="Enter Fax Consignee" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputAddressCons">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_cons" id="address_cons" rows="3"
                                                                placeholder="Enter Address Consignee" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailCons">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_cons" id="email_cons"
                                                                placeholder="Enter Email Consignee" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxCons">ISI TAX</label>
                                                            <input type="text" name="tax_id_cons"
                                                                class="form-control form-control-sm" id="tax_id_cons"
                                                                value="" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                            <div class="container">
                                                <div class="row mt-5">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputNotifyParty">Notify Party</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="notify_party_id" id="notify_party_id"
                                                                placeholder="Enter Notify Party">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone1Notify">Phone 1</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_1_notify" id="phone_1_notify"
                                                                placeholder="Enter Phone 1 Notify Party" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPhone2Notify">Phone 2</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="phone_2_notify" id="phone_2_notify"
                                                                placeholder="Enter Phone 2 Notify Party" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputFaxNotify">Fax</label>
                                                            <input type="number" class="form-control form-control-sm"
                                                                name="fax_notify" id="fax_notify"
                                                                placeholder="Enter Fax Notify Party" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputAddressNotify">Address</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="address_notify" id="address_notify"
                                                                rows="3" placeholder="Enter Address Notify Party" disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputEmailNotify">Email address</label>
                                                            <input type="email" class="form-control form-control-sm"
                                                                name="email_notify" id="email_notify"
                                                                placeholder="Enter Email Notify Party" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputMandatoryTaxNotify">ISI TAX</label>
                                                            <input type="text" name="tax_id_notify"
                                                                class="form-control form-control-sm" id="tax_id_notify"
                                                                value="" disabled>
                                                        </div>
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
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCarrier">Carrier</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="carrier" id="carrier"
                                                                placeholder="Enter Carrier">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputVassel">Vessel / Voyage</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="vassel" id="vassel" placeholder="Enter Vassel">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>ETD :</label>
                                                            <div class="input-group date" id="etd"
                                                                data-target-input="nearest">
                                                                <input type="text"
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
                                                                placeholder="Enter Port Of Discharge">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Open CY :</label>
                                                            <div class="input-group date" id="open_cy"
                                                                data-target-input="nearest">
                                                                <input type="text"
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
                                                                <input type="text"
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
                                                                <input type="text"
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
                                                                name="volume" id="volume" placeholder="Enter Volume">
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <label>Size / Type Container</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>20OC - 20' HIGH CUBE OPEN TOP ESPCIALLY FOR
                                                                    COAL
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <label for="inputQty">Quantity</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="qty" id="qty" placeholder="Enter Qty">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Type Pack</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>CONTAINER, NOT OTHERWISE SPECIFIED AS
                                                                    TRANSPORT
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
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
                                                                placeholder="Enter Commodity M-B/L">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label>M-B/L</label>
                                                            <select class="form-control form-control-sm mb-2 select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>ORIGINAL
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
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
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputCommodityHbl">Commodity H-B/L</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="commodity_hbl" id="commodity_hbl"
                                                                placeholder="Enter Commodity H-B/L">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>H-B/L</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>ORIGINAL
                                                                </option>
                                                            </select>
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
                                                                placeholder="Enter Gross Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Type Weight</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>KGS
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputNetWeight">Net Weight</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="net_weight" id="net_weight"
                                                                placeholder="Enter Net Weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Type Weight</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>KGS
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputMeasurement">Measurement</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="measurement" id="measurement"
                                                                placeholder="Enter Measurement">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Type Measurement</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>CBM
                                                                </option>
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
                                                                <input type="text"
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
                                                                rows="3" placeholder="Enter Stuffing Address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicName">PIC Name</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_name" id="pic_name"
                                                                placeholder="Enter PIC Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-group">
                                                            <label for="inputPicPhone">PIC Phone</label>
                                                            <input type="number"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="pic_phone" id="pic_phone"
                                                                placeholder="Enter PIC Phone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="inputShipper">Term Of Payment
                                                                (Shipper)</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm text-uppercase"
                                                                name="top" id="top"
                                                                placeholder="Enter Terms Of Payment">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Ocean Freight (Carrier)</label>
                                                            <select class="form-control form-control-sm select2"
                                                                style="width: 100%;">
                                                                <option selected="selected"></option>
                                                                <option>PREPAID
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputRemarks">Remaks</label>
                                                            <textarea class="form-control form-control-sm text-uppercase" name="remaks" id="remaks" rows="5"
                                                                placeholder="Enter Remarks"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="fileShippingPath">File Shipping
                                                                Instruction</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        id="file_shipping_path">
                                                                    <label class="custom-file-label"
                                                                        for="file_shipping_path">Choose
                                                                        file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr size="100" noshade>
                                            </div>
                                        </div>
                                        <!-- tab end description -->

                                        {{-- <!-- tab start selling & buying -->
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
                                                                <input type="number"
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
                                                        <input type="number"
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
                                                        <input type="number" class="form-control form-control-sm"
                                                            id="input#" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="text" class="form-control" placeholder=""
                                                                disabled>
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
                                                            id="inputPassword" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL
                                                        REVENUE
                                                        IN IDR</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" disabled>
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
                                                        <input type="number"
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">TOTAL + VAT
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">GRANDTOTAL
                                                        SELLING RATE</label>
                                                    <div class="col-md-2 offset-md-6">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" disabled>
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
                                                                <input type="number"
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
                                                        <input type="number"
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
                                                        <input type="number" class="form-control form-control-sm"
                                                            id="input#" placeholder="">
                                                    </div>
                                                    <div class="col-sm-0">
                                                        <p style="text-align: center">=</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="text" class="form-control" placeholder=""
                                                                disabled>
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
                                                            id="inputPassword" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL COST
                                                        IN IDR</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="inputPassword" disabled>
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
                                                        <input type="number"
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword" class="col-sm-4 col-form-label">TOTAL + VAT
                                                        11%</label>
                                                    <div class="col-md-2 offset-md-5">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                                            <input type="text" class="form-control" disabled>
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
                                        <!-- tab end selling & buying --> --}}
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

{{-- <script>
    $(function () {
        $('#shipper_id').autocomplete({
            source: function(request, response) {

                $.getJSON('?term=' + request.term, function(data) {
                    var array = $.map(data, function(row) {
                        return {
                            value: row.id,
                            label: row.name,
                            name: row.name,
                            address: row.address_ship,
                            phone_1: row.phone_1_ship,
                            phone_2: row.phone_2_ship,
                            fax: row.fax_ship,
                            email: row.email_ship,
                            mandatory_tax_id: row.mandatory_tax_id,
                            tax_id: row.tax_id_ship,
                        }
                    })

                    response($.ui.autocomplete.filter(array, request.term));
                })
            },
            minLength: 1,
            delay: 500,
            select: function(event, ui) {
                $('#shipper_id').val(ui.item.shipper_id)
                $('#name_ship').val(ui.item.name_ship)
                $('#address_ship').val(ui.item.address_ship)
                $('#phone_1_ship').val(ui.item.phone_1_ship)
                $('#phone_2_ship').val(ui.item.phone_2_ship)
                $('#fax_ship').val(ui.item.fax_ship)
                $('#email_ship').val(ui.item.email_ship)
                $('#mandatory_tax_id_ship').val(ui.item.mandatory_tax_id_ship)
                $('#tax_id_ship').val(ui.item.tax_id_ship)
            }
        })
    })
</script> --}}
