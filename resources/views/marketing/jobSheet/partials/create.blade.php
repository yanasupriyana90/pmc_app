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
                                <!-- form start -->
                                <form action="{{ Route('jobSheet.store') }}" method="POST">
                                    @csrf
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
                                                role="tab" aria-controls="description"
                                                aria-selected="false">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="selling_buying-tab" data-toggle="pill"
                                                href="#selling_buying" role="tab" aria-controls="selling_buying"
                                                aria-selected="false">Selling & Buying</a>
                                        </li>
                                    </ul>
                            </div>
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
                                                            name="code_jb" id="code_jb" disabled>
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
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputShipper">Shipper</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="shipper_id" id="shipper_id"
                                                            placeholder="Enter Name Shipper">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputPhone_1">Phone 1</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="phone_1" id="phone_1"
                                                            placeholder="Enter Phone 1 Shipper" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputPhone_2">Phone 2</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="phone_2" id="phone_2"
                                                            placeholder="Enter Phone 2 Shipper" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputFax">Fax</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="fax" id="fax" placeholder="Enter Fax Shipper"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Address</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="address" id="address" rows="3"
                                                            placeholder="Enter Address Shipper" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email address</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="email" id="email"
                                                            placeholder="Enter Email Shipper" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputNPWP">NPWP</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="npwp" id="npwp"
                                                            placeholder="Enter NPWP Shipper" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr size="100" noshade>
                                        </div>
                                        <div class="container">
                                            <div class="row mt-5">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputUndername">Undername</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername"
                                                            placeholder="Enter Undername">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputUndnamePhone_1">Phone 1</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="undname_phone_1" id="undname_phone_1"
                                                            placeholder="Enter Phone 1 Undername" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputUndnamePhone_2">Phone 2</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="undname_phone_2" id="undname_phone_2"
                                                            placeholder="Enter Phone 2 Undername" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputUndnameFax">Fax</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="undname_fax" id="undname_fax"
                                                            placeholder="Enter Fax Undername" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputUndnameAddress">Address</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="undname_address" id="undname_address"
                                                            rows="3" placeholder="Enter Address Undername" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputUndnameEmail">Email address</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="undname_email" id="undname_email"
                                                            placeholder="Enter Email Undername" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputUndnameNPWP">NPWP</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="undname_npwp" id="undname_npwp"
                                                            placeholder="Enter NPWP Undername" disabled>
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
                                                            name="consignee" id="consignee"
                                                            placeholder="Enter Consignee">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputConsPhone_1">Phone 1</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="cons_phone_1" id="cons_phone_1"
                                                            placeholder="Enter Phone 1 Consignee" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputConsPhone_2">Phone 2</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="cons_phone_2" id="cons_phone_2"
                                                            placeholder="Enter Phone 2 Consignee" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputConsFax">Fax</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="cons_fax" id="cons_fax"
                                                            placeholder="Enter Fax Consignee" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputConsAddress">Address</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="cons_address" id="cons_address" rows="3"
                                                            placeholder="Enter Address Consignee" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputConsEmail">Email address</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="cons_email" id="cons_email"
                                                            placeholder="Enter Email Consignee" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputTaxId">Tax ID</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="cons_tax_id" id="cons_tax_id"
                                                            placeholder="Enter Tax ID Consignee" disabled>
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
                                                            name="notify_party" id="notify_party"
                                                            placeholder="Enter Notify Party">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputNotifyPhone_1">Phone 1</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="notify_phone_1" id="notify_phone_1"
                                                            placeholder="Enter Phone 1 Notify Party" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputNotifyPhone_2">Phone 2</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="notify_phone_2" id="notify_phone_2"
                                                            placeholder="Enter Phone 2 Notify Party" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputNotifyFax">Fax</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="notify_fax" id="notify_fax"
                                                            placeholder="Enter Fax Notify Party" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputNotifyAddress">Address</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="notify_address" id="notify_address"
                                                            rows="3" placeholder="Enter Address Notify Party" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputNotifyEmail">Email address</label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="notify_email" id="notify_email"
                                                            placeholder="Enter Email Notify Party" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="inputNotifyTaxId">Tax ID</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="notify_tax_id" id="notify_tax_id"
                                                            placeholder="Enter Tax ID Notify Party" disabled>
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
                                                            name="carrier" id="carrier" placeholder="Enter Carrier">
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
                                                            <option>20OC - 20' HIGH CUBE OPEN TOP ESPCIALLY FOR COAL
                                                            </option>
                                                            <option>40G1 - 40' HQ HANGER CONTAINER RACK 1-TIER - 9'6'
                                                            </option>
                                                            <option>40G2 - 40' HQ HANGER CONTAINER RACK 2-TIER - 9'6'
                                                            </option>
                                                            <option>40G3 - 40' HQ HANGER CONTAINER RACK 3-TIER - 9'6'
                                                            </option>
                                                            <option>40G4 - 40' HQ HANGER CONTAINER RACK 4-TIER - 9'6'
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
                                                            <option>CONTAINER, NOT OTHERWISE SPECIFIED AS TRANSPORT
                                                                EQUIPMENT
                                                            </option>
                                                            <option>UNCONTAINERSIZED CARGO AS PALLET(UNCAGED)
                                                            </option>
                                                            <option>PALLET, MODULAR, COLLARS 80CMS * 120CMS
                                                            </option>
                                                            <option>BULK, LIQUEFUED GAS (AT ABNORMAL
                                                                TEMPERATURE/PRESSURE)
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
                                                            name="commodity" id="commodity"
                                                            placeholder="Enter commodity">
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
                                                            <option>SEA WAYBILL
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
                                                        <label for="inputCommodityMbl">Enter Email Or Other</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm mb-2 text-uppercase"
                                                            name="commodity" id="commodity"
                                                            placeholder="Enter commodity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2 offset-md-5">
                                                    <div class="form-group">
                                                        <label for="inputCommodityMbl">Issue Location</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm mb-2 text-uppercase"
                                                            name="commodity" id="commodity"
                                                            placeholder="Enter commodity">
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
                                                            name="undername" id="undername"
                                                            placeholder="Enter Undername">
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
                                                            <option>SEA WAYBILL
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
                                                            <option>LB/LBS
                                                            </option>
                                                            <option>M/T (M per T)
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
                                                            <option>LB/LBS
                                                            </option>
                                                            <option>M/T (M per T)
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
                                                            <option>CBF
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
                                                            <div class="input-group-append" data-target="#stuffing_date"
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
                                                        <label for="inputStuffingAddress">Stuffing Address</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="stuffing_address" id="stuffing_address"
                                                            rows="3" placeholder="Enter Stuffing Address"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="inputPicName">PIC Name</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="pic_name" id="pic_name" placeholder="Enter PIC Name">
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
                                                        <label for="inputShipper">Term Of Payment (Shipper)</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-uppercase"
                                                            name="undername" id="undername"
                                                            placeholder="Enter Undername">
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
                                                            <option>COLLECT
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputStuffingAddress">Remaks</label>
                                                        <textarea class="form-control form-control-sm text-uppercase" name="stuffing_address" id="stuffing_address"
                                                            rows="5" placeholder="Enter Stuffing Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File Shipping Instruction</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
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
                                                                <div class="input-group-append" data-target="#issue_date"
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
                                                                <div class="input-group-append" data-target="#due_date"
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
                                                <label for="inputPassword" class="col-sm-2 col-form-label">TOTAL REVENUE
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
                                                <label for="inputPassword" class="col-sm-2 col-form-label">PPN 11%</label>
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
                                                <label for="inputPassword" class="col-sm-2 col-form-label">PPN 11%</label>
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




                                        <div class="container">
                                            {{-- Hidden User --}}
                                            <input type="hidden" class="form-control form-control-sm" name="user_id"
                                                id="user_id" value="{{ Auth::user()->id }}" placeholder="">

                                            <div class="d-grid gap-2 d-md-block mt-5">
                                                <button class="btn btn-primary" type="submit">SAVE</button>
                                                <a href="#" class="btn btn-danger" type="button">CANCEL</a>
                                            </div>
                                        </div>
                                        <!-- tab end selling & buying -->

                                    </div>
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
