@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
@section('subtitle_2', 'Selling & Buying')
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
                        <h1 class="m-0">@yield('subtitle') (@yield('subtitle_2'))</h1>
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Description 1
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Jobsheet Code</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->code_js }}</dd>
                                    <dt class="col-sm-4">Booking No.</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->booking_no))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->booking_no }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Shipper</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->shipper['name'] }}</dd>
                                    <dt class="col-sm-4">Undername MBL</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->undernameMbl))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->undernameMbl['name'] }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Undername HBL</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->undernameHbl))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->undernameHbl['name'] }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Container Type</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->containerSizeType['name'] }}</dd>
                                    <dt class="col-sm-4">Port Of Discharge</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->pod }}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Description 2
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Carrier</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->carrier }}</dd>
                                    <dt class="col-sm-4">Vessel</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->vessel }}</dd>
                                    <dt class="col-sm-4">ETD</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->etd }}</dd>
                                    <dt class="col-sm-4">Freight & Charges</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->typePayment['name'] }}</dd>
                                    <dt class="col-sm-4">Volume</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->volume }}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <form action="{{ route('jobSheet.sellingBuyingStore') }}" method="POST">
                    @csrf

                    <!-- REVENUE OF SALES -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@yield('title_card_1')</h3><br>
                            <h3 class="card-title">@yield('title_card_2')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                                            <div class="col-sm-1" hidden>
                                                <div class="form-group">
                                                    <label>Job Sheet Head ID</label>
                                                    <input class="form-control" type="number" id="jobSheetHeadId"
                                                        name="jobSheetHeadId" value="{{ $jobSheetHeadList->id }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-1" hidden>
                                                <div class="form-group">
                                                    <label>User ID</label>
                                                    <input class="form-control" type="number" id="userId" name="userId"
                                                        value="{{ $jobSheetHeadList->user_id }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label>Exchange Rate</label>
                                                    <input class="form-control form-control-sm input_sm number_only"
                                                        type="text" id="exchangeRateRos" name="exchangeRateRos" value="{{ old('exchangeRateRos') }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td colspan="2">
                                                                    <table id="tableRos" class="table table-bordered">
                                                                        <tr>
                                                                            <th class="text text-center" width="3%">
                                                                                No.</th>
                                                                            <th class="text text-center" width="20%">
                                                                                Item
                                                                                Name</th>
                                                                            <th class="text text-center" width="5%">
                                                                                Volume
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Price
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Actual
                                                                                Amount</th>
                                                                            <th class="text text-center" width="17%"
                                                                                colspan="2">Tax (%)</th>
                                                                            <th class="text text-center" width="13%">
                                                                                Total</th>
                                                                            <th class="text text-center" width="3%"
                                                                                rowspan="2"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th class="text-center">$</th>
                                                                            <th class="text-center">$</th>
                                                                            <th class="text text-center" width="7%">
                                                                                Rate
                                                                            </th>
                                                                            <th class="text text-center">Amount ($)</th>
                                                                            <th class="text-center">$</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text text-center"><span
                                                                                    id="ros_no">1</span></td>
                                                                            <td><input type="text" name="itemNameRos[]"
                                                                                    id="itemNameRos1"
                                                                                    class="form-control form-control-sm input-sm text-uppercase" value="{{ old('itemNameRos') }}"/>
                                                                            </td>
                                                                            <td><input type="text" name="volRos[]"
                                                                                    id="volRos1" data-ros-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only volRos"
                                                                                    value="{{ $jobSheetHeadList->volume }}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td><input type="text" name="priceRos[]"
                                                                                    id="priceRos1" data-ros-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only priceRos rupiah" value="{{ old('priceRos') }}" />
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="actualAmountRos[]"
                                                                                    id="actualAmountRos1" data-ros-no="1"
                                                                                    class="form-control form-control-sm input-sm actualAmountRos" value="{{ old('actualAmountRos') }}"
                                                                                    readonly /></td>
                                                                            <td><input type="text" name="taxRateRos[]"
                                                                                    id="taxRateRos1" data-ros-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only taxRateRos" value="{{ old('taxRateRos') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="taxAmountRos[]"
                                                                                    id="taxAmountRos1" data-ros-no="1"
                                                                                    readonly
                                                                                    class="form-control form-control-sm input-sm taxAmountRos" value="{{ old('taxAmountRos') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="itemFinalAmountRos[]"
                                                                                    id="itemFinalAmountRos1"
                                                                                    data-ros-no="1" readonly
                                                                                    class="form-control form-control-sm input-sm itemFinalAmountRos" value="{{ old('itemFinalAmountRos') }}"/>
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <div align="right">
                                                                        <button type="button" name="add_row_ros"
                                                                            id="add_row_ros"
                                                                            class="btn btn-success btn-xs"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total ($)</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountRos"></span></b>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                    id="finalTotalAmountRos"
                                                                    name="finalTotalAmountRos" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total (Rp.)</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountExRateRos"></span></b>
                                                                </td> --}}
                                                                {{-- <td align="right"><input type="text"
                                                                        id="finalTotalAmountExRateRos"
                                                                        name="finalTotalAmountExRateRos"
                                                                        class="finalTotalAmountExRateRos" onkeyup="sum();"
                                                                        readonly>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                        id="finalTotalAmountExRateRos"
                                                                        name="finalTotalAmountExRateRos" readonly>
                                                                </td>

                                                            </tr>
                                                            {{-- <tr>
                                                                <td colspan="2"></td>
                                                            </tr> --}}
                                                            <tr hidden>
                                                                <td colspan="2" align="center">
                                                                    <input type="text" name="totalItemRos"
                                                                        id="totalItemRos" value="1" />
                                                                    {{-- <input type="submit" name="create_invoice"
                                                                        id="create_invoice" class="btn btn-info"
                                                                        value="Create" /> --}}
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
                        <!-- /.card -->

                    </div>
                    <!-- END REVENUE OF SALES -->

                    <!-- EMKL -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">@yield('title_card_3')</h3><br>
                            <h3 class="card-title">@yield('title_card_2')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                                                                    <table id="tableEmkl" class="table table-bordered">
                                                                        <tr>
                                                                            <th class="text text-center" width="3%">
                                                                                No.</th>
                                                                            <th class="text text-center" width="20%">
                                                                                Item
                                                                                Name</th>
                                                                            <th class="text text-center" width="5%">
                                                                                Volume
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Price
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Actual
                                                                                Amount</th>
                                                                            <th class="text text-center" width="17%"
                                                                                colspan="2">Tax (%)</th>
                                                                            <th class="text text-center" width="13%">
                                                                                Total</th>
                                                                            <th class="text text-center" width="3%"
                                                                                rowspan="2"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th class="text-center">Rp.</th>
                                                                            <th></th>
                                                                            <th class="text text-center" width="7%">
                                                                                Rate
                                                                            </th>
                                                                            <th class="text text-center">Amount (Rp.)</th>
                                                                            <th class="text-center">Rp.</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text text-center"><span
                                                                                    id="emkl_no">1</span></td>
                                                                            <td><input type="text"
                                                                                    name="itemNameEmkl[]"
                                                                                    id="itemNameEmkl1"
                                                                                    class="form-control form-control-sm input-sm text-uppercase" value="{{ old('itemNameEmkl') }}"/>
                                                                            </td>
                                                                            <td><input type="text" name="volEmkl[]"
                                                                                    id="volEmkl1" data-emkl-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only volEmkl" value="{{ old('volEmkl') }}"/>
                                                                            </td>
                                                                            <td><input type="text" name="priceEmkl[]"
                                                                                    id="priceEmkl1" data-emkl-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only priceEmkl" value="{{ old('priceEmkl') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="actualAmountEmkl[]"
                                                                                    id="actualAmountEmkl1"
                                                                                    data-emkl-no="1"
                                                                                    class="form-control form-control-sm input-sm actualAmountEmkl" value="{{ old('actualAmountEmkl') }}"
                                                                                    readonly /></td>
                                                                            <td><input type="text" name="taxRateEmkl[]"
                                                                                    id="taxRateEmkl1" data-emkl-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only taxRateEmkl" value="{{ old('taxRateEmkl') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="taxAmountEmkl[]"
                                                                                    id="taxAmountEmkl1" data-emkl-no="1"
                                                                                    readonly
                                                                                    class="form-control form-control-sm input-sm taxAmountEmkl" value="{{ old('taxAmountEmkl') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="itemFinalAmountEmkl[]"
                                                                                    id="itemFinalAmountEmkl1"
                                                                                    data-emkl-no="1" readonly
                                                                                    class="form-control form-control-sm input-sm itemFinalAmountEmkl" value="{{ old('itemFinalAmountEmkl') }}"/>
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <div align="right">
                                                                        <button type="button" name="add_row_emkl"
                                                                            id="add_row_emkl"
                                                                            class="btn btn-success btn-xs"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountEmkl" onkeyup="sum();"></span></b>
                                                                </td> --}}
                                                                {{-- <td align="right"><input type="text"
                                                                        id="finalTotalAmountEmkl"
                                                                        name="finalTotalAmountEmkl"
                                                                        class="finalTotalAmountEmkl" onkeyup="sum();"
                                                                        readonly>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                        id="finalTotalAmountEmkl"
                                                                        name="finalTotalAmountEmkl" readonly>
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td colspan="2"></td>
                                                            </tr> --}}
                                                            <tr hidden>
                                                                <td colspan="2" align="center">
                                                                    <input type="text" name="totalItemEmkl"
                                                                        id="totalItemEmkl" value="1" />
                                                                    {{-- <input type="submit" name="create_invoice"
                                                                        id="create_invoice" class="btn btn-info"
                                                                        value="Create" /> --}}
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
                    <!-- /.card -->
                    <!-- END EMKL -->

                    <!-- COST OF SALES -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">@yield('title_card_4')</h3><br>
                            <h3 class="card-title">@yield('title_card_5')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                                                    <input class="form-control form-control-sm input-sm number_only"
                                                        type="text" id="exchangeRateCos" name="exchangeRateCos" value="{{ old('exchangeRateRos') }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td colspan="2">
                                                                    <table id="tableCos" class="table table-bordered">
                                                                        <tr>
                                                                            <th class="text text-center" width="3%">
                                                                                No.</th>
                                                                            <th class="text text-center" width="20%">
                                                                                Item
                                                                                Name</th>
                                                                            <th class="text text-center" width="5%">
                                                                                Volume
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Price
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Actual
                                                                                Amount</th>
                                                                            <th class="text text-center" width="17%"
                                                                                colspan="2">Tax (%)</th>
                                                                            <th class="text text-center" width="13%">
                                                                                Total</th>
                                                                            <th class="text text-center" width="3%"
                                                                                rowspan="2"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th class="text-center">$</th>
                                                                            <th class="text-center">$</th>
                                                                            <th class="text text-center" width="7%">
                                                                                Rate
                                                                            </th>
                                                                            <th class="text text-center">Amount ($)</th>
                                                                            <th class="text-center">$</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text text-center"><span
                                                                                    id="cos_no">1</span></td>
                                                                            <td><input type="text" name="itemNameCos[]"
                                                                                    id="itemNameCos1"
                                                                                    class="form-control form-control-sm input-sm text-uppercase" value="{{ old('itemNameCos') }}"/>
                                                                            </td>
                                                                            <td><input type="text" name="volCos[]"
                                                                                    id="volCos1" data-cos-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only volCos"
                                                                                    value="{{ $jobSheetHeadList->volume }}"
                                                                                    readonly />
                                                                            </td>
                                                                            <td><input type="text" name="priceCos[]"
                                                                                    id="priceCos1" data-cos-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only priceCos" value="{{ old('priceCos') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="actualAmountCos[]"
                                                                                    id="actualAmountCos1" data-cos-no="1"
                                                                                    class="form-control form-control-sm input-sm actualAmountCos" value="{{ old('actualAmountCos') }}"
                                                                                    readonly /></td>
                                                                            <td><input type="text" name="taxRateCos[]"
                                                                                    id="taxRateCos1" data-cos-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only taxRateCos" value="{{ old('taxRateCos') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="taxAmountCos[]"
                                                                                    id="taxAmountCos1" data-cos-no="1"
                                                                                    readonly
                                                                                    class="form-control form-control-sm input-sm taxAmountCos" value="{{ old('taxAmountCos') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="itemFinalAmountCos[]"
                                                                                    id="itemFinalAmountCos1"
                                                                                    data-cos-no="1" readonly
                                                                                    class="form-control form-control-sm input-sm itemFinalAmountCos" value="{{ old('itemFinalAmountCos') }}"/>
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <div align="right">
                                                                        <button type="button" name="add_row_cos"
                                                                            id="add_row_cos"
                                                                            class="btn btn-success btn-xs"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total ($)</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountCos"></span></b>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                    id="finalTotalAmountCos"
                                                                    name="finalTotalAmountCos" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total (Rp.)</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountExRateCos"></span></b>
                                                                </td> --}}
                                                                {{-- <td align="right"><input type="text"
                                                                        id="finalTotalAmountExRateCos"
                                                                        name="finalTotalAmountExRateCos"
                                                                        class="finalTotalAmountExRateCos" onkeyup="sum();"
                                                                        readonly>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                        id="finalTotalAmountExRateCos"
                                                                        name="finalTotalAmountExRateCos" readonly>
                                                                </td>

                                                            </tr>
                                                            {{-- <tr>
                                                                <td colspan="2"></td>
                                                            </tr> --}}
                                                            <tr hidden>
                                                                <td colspan="2" align="center">
                                                                    <input type="text" name="totalItemCos"
                                                                        id="totalItemCos" value="1" />
                                                                    {{-- <input type="submit" name="create_invoice"
                                                                        id="create_invoice" class="btn btn-info"
                                                                        value="Create" /> --}}
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
                        <!-- /.card -->

                    </div>
                    <!-- END COST OF SALES -->

                    <!-- HANDLING -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">@yield('title_card_6')</h3><br>
                            <h3 class="card-title">@yield('title_card_5')</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                                                                    <table id="tableHand" class="table table-bordered">
                                                                        <tr>
                                                                            <th class="text text-center" width="3%">
                                                                                No.</th>
                                                                            <th class="text text-center" width="20%">
                                                                                Item
                                                                                Name</th>
                                                                            <th class="text text-center" width="5%">
                                                                                Volume
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Price
                                                                            </th>
                                                                            <th class="text text-center" width="10%">
                                                                                Actual
                                                                                Amount</th>
                                                                            <th class="text text-center" width="17%"
                                                                                colspan="2">Tax (%)</th>
                                                                            <th class="text text-center" width="13%">
                                                                                Total</th>
                                                                            <th class="text text-center" width="3%"
                                                                                rowspan="2"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th class="text-center">Rp.</th>
                                                                            <th class="text-center">Rp.</th>
                                                                            <th class="text text-center" width="7%">
                                                                                Rate
                                                                            </th>
                                                                            <th class="text text-center">Amount (Rp.)</th>
                                                                            <th class="text-center">Rp.</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text text-center"><span
                                                                                    id="hand_no">1</span></td>
                                                                            <td><input type="text"
                                                                                    name="itemNameHand[]"
                                                                                    id="itemNameHand1"
                                                                                    class="form-control form-control-sm input-sm text-uppercase" value="{{ old('itemNameHand') }}" />
                                                                            </td>
                                                                            <td><input type="text" name="volHand[]"
                                                                                    id="volHand1" data-hand-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only volHand" value="{{ old('volHand') }}"/>
                                                                            </td>
                                                                            <td><input type="text" name="priceHand[]"
                                                                                    id="priceHand1" data-hand-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only priceHand" value="{{ old('priceHand') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="actualAmountHand[]"
                                                                                    id="actualAmountHand1"
                                                                                    data-hand-no="1"
                                                                                    class="form-control form-control-sm input-sm actualAmountHand" value="{{ old('actualAmountHand') }}"
                                                                                    readonly /></td>
                                                                            <td><input type="text" name="taxRateHand[]"
                                                                                    id="taxRateHand1" data-hand-no="1"
                                                                                    class="form-control form-control-sm input-sm number_only taxRateHand" value="{{ old('taxRateHand') }}"/>
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="taxAmountHand[]"
                                                                                    id="taxAmountHand1" data-hand-no="1" value="{{ old('taxAmountHand') }}"
                                                                                    readonly
                                                                                    class="form-control form-control-sm input-sm taxAmountHand" />
                                                                            </td>
                                                                            <td><input type="text"
                                                                                    name="itemFinalAmountHand[]"
                                                                                    id="itemFinalAmountHand1"
                                                                                    data-hand-no="1" readonly
                                                                                    class="form-control form-control-sm input-sm itemFinalAmountHand" value="{{ old('itemFinalAmountHand') }}" />
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </table>
                                                                    <div align="right">
                                                                        <button type="button" name="add_row_hand"
                                                                            id="add_row_hand"
                                                                            class="btn btn-success btn-xs"><i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right"><b>Total</td>
                                                                {{-- <td align="right"><b><span
                                                                            id="finalTotalAmountHand" onkeyup="sum();"></span></b>
                                                                </td> --}}
                                                                {{-- <td align="right"><input type="text"
                                                                        id="finalTotalAmountHand"
                                                                        name="finalTotalAmountHand"
                                                                        class="finalTotalAmountHand" onkeyup="sum();"
                                                                        readonly>
                                                                </td> --}}
                                                                <td align="right"><input type="text"
                                                                        id="finalTotalAmountHand"
                                                                        name="finalTotalAmountHand" readonly>
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td colspan="2"></td>
                                                            </tr> --}}
                                                            <tr hidden>
                                                                <td colspan="2" align="center">
                                                                    <input type="text" name="totalItemHand"
                                                                        id="totalItemHand" value="1" />
                                                                    {{-- <input type="submit" name="create_invoice"
                                                                        id="create_invoice" class="btn btn-info"
                                                                        value="Create" /> --}}
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
                        <!-- /.card -->

                    </div>
                    <!-- END HANDLING -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Remarks:</p>

                            <textarea class="form-control form-control-sm input-sm text-uppercase" rows="7" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Accumulation</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Grand Total Selling :</th>
                                        <td>
                                            <input type="text" name="grandTotalSelling" id="grandTotalSelling" readonly
                                                class="form-control form-control-sm input-sm rupiah" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Grand Total Buying :</th>
                                        <td>
                                            <input type="text" name="grandTotalBuying" id="grandTotalBuying"readonly
                                                class="form-control form-control-sm input-sm rupiah" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Profit/Loss :</th>
                                        <td>
                                            <input type="text" name="profitLoss" id="profitLoss"readonly
                                                class="form-control form-control-sm input-sm rupiah" />
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th style="width:50%"></th>
                                        <td>
                                            <button class="btn btn-success" style="width: 100%" id="calculate">Calculate</button>
                                        </td>
                                    </tr> --}}
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>


                    <!-- /.container-fluid -->
                    <div class="container">

                        {{-- <div class="submit-section">
                            <button class="btn btn-primary submit-btn m-r-10">Save & Send</button>
                            <button type="submit" class="btn btn-primary submit-btn justify-content-center">Save</button>
                        </div> --}}
                        <div class="row justify-content-md-center">
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-primary" type="submit">SAVE</button>
                                <a href="{{ route('jobSheet') }}" class="btn btn-danger" type="button">CANCEL</a>
                            </div>
                        </div>
                    </div>
                </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('script')
    <!-- REVENUE OF SALES SCRIPT -->
    <script>
        $(document).ready(function() {
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
                    '"class="form-control form-control-sm input-sm number_only volRos" value="{{ $jobSheetHeadList->volume }}" readonly/></td>';
                html_code += '<td><input type="text" name="priceRos[]" id="priceRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only priceRos" /></td>';
                html_code +=
                    '<td><input type="text" name="actualAmountRos[]" id="actualAmountRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm actualAmountRos" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateRos[]" id="taxRateRos' + count +
                    '" data-ros-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateRos" /></td>';
                html_code += '<td><input type="text" name="taxAmountRos[]" id="taxAmountRos' + count +
                    '" data-ros-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm taxAmountRos" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountRos[]" id="itemFinalAmountRos' +
                    count + '" data-ros-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm itemFinalAmountRos" /></td>';
                html_code += '<td><button type="button" name="remove_row_ros" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_ros"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableRos').append(html_code);
            });

            $(document).on('click', '.remove_row_ros', function() {
                var row_id_ros = $(this).attr("id");
                var total_item_amount_ros = $('#itemFinalAmountRos' + row_id_ros).val();
                var final_amount_ros = $('#finalTotalAmountRos').val();
                var result_amount_ros = parseFloat(final_amount_ros) - parseFloat(total_item_amount_ros);
                var ex_rate_ros = $('#exchangeRateRos').val();
                final_item_total_ex_rate_ros = parseFloat(result_amount_ros) * parseFloat(ex_rate_ros);
                $('#finalTotalAmountRos').val(result_amount_ros);
                $('#finalTotalAmountExRateRos').val(final_item_total_ex_rate_ros.toFixed(4));
                $('#row_id_ros_' + row_id_ros).remove();
                count--;
                $('#totalItemRos').val(count);
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
                    ex_rate_ros = $('#exchangeRateRos').val();
                    // final_item_total_emkl = $('#finalTotalAmountEmkl').val();
                    // if (isNaN(final_item_total_emkl)
                    //     final_item_total_emkl = 0
                    // );
                    // console.log(final_item_total_emkl);
                    vol_ros = $('#volRos' + rowRos).val();
                    if (vol_ros > 0) {
                        price_ros = $('#priceRos' + rowRos).val();
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
                var total_ros = $('#finalTotalAmountExRateRos').val();
                var total_emkl = $('#finalTotalAmountEmkl').val();
                var total_cos = $('#finalTotalAmountExRateCos').val();
                var total_hand = $('#finalTotalAmountHand').val();
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
            var finalTotalAmountEmkl = $('#finalTotalAmountEmkl').text();
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
                    '" class="form-control form-control-sm input-sm number_only rupiah priceEmkl" /></td>'
                html_code +=
                    '<td><input type="text" name="actualAmountEmkl[]" id="actualAmountEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" class="form-control form-control-sm input-sm actualAmountEmkl" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateEmkl[]" id="taxRateEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateEmkl" /></td>';
                html_code += '<td><input type="text" name="taxAmountEmkl[]" id="taxAmountEmkl' + count +
                    '" data-emkl-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm taxAmountEmkl" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountEmkl[]" id="itemFinalAmountEmkl' +
                    count + '" data-emkl-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm itemFinalAmountEmkl" /></td>';
                html_code += '<td><button type="button" name="remove_row_emkl" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_emkl"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableEmkl').append(html_code);
            });

            $(document).on('click', '.remove_row_emkl', function() {
                var row_id_emkl = $(this).attr("id");
                var total_item_amount_emkl = $('#itemFinalAmountEmkl' + row_id_emkl).val();
                var final_amount_emkl = $('#finalTotalAmountEmkl').val();
                var result_amount_emkl = parseFloat(final_amount_emkl) - parseFloat(total_item_amount_emkl);
                $('#finalTotalAmountEmkl').val(result_amount_emkl.toFixed(4));
                $('#row_id_emkl_' + row_id_emkl).remove();
                count--;
                $('#totalItemEmkl').val(count);
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
                        price_emkl = $('#priceEmkl' + rowEmkl).val();
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
                var total_ros = $('#finalTotalAmountExRateRos').val();
                var total_emkl = $('#finalTotalAmountEmkl').val();
                var total_cos = $('#finalTotalAmountExRateCos').val();
                var total_hand = $('#finalTotalAmountHand').val();
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
                    '"class="form-control form-control-sm input-sm number_only volCos" value="{{ $jobSheetHeadList->volume }}" readonly/></td>';
                html_code += '<td><input type="text" name="priceCos[]" id="priceCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only priceCos" /></td>';
                html_code +=
                    '<td><input type="text" name="actualAmountCos[]" id="actualAmountCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm actualAmountCos" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateCos[]" id="taxRateCos' + count +
                    '" data-cos-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateCos" /></td>';
                html_code += '<td><input type="text" name="taxAmountCos[]" id="taxAmountCos' + count +
                    '" data-cos-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm taxAmountCos" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountCos[]" id="itemFinalAmountCos' +
                    count + '" data-cos-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm itemFinalAmountCos" /></td>';
                html_code += '<td><button type="button" name="remove_row_cos" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_cos"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableCos').append(html_code);
            });

            $(document).on('click', '.remove_row_cos', function() {
                var row_id_cos = $(this).attr("id");
                var total_item_amount_cos = $('#itemFinalAmountCos' + row_id_cos).val();
                var final_amount_cos = $('#finalTotalAmountCos').val();
                var result_amount_cos = parseFloat(final_amount_cos) - parseFloat(total_item_amount_cos);
                var ex_rate_cos = $('#exchangeRateCos').val();
                final_item_total_ex_rate_cos = parseFloat(result_amount_cos) * parseFloat(ex_rate_cos);
                $('#finalTotalAmountCos').val(result_amount_cos);
                $('#finalTotalAmountExRateCos').val(final_item_total_ex_rate_cos.toFixed(4));
                $('#row_id_cos_' + row_id_cos).remove();
                count--;
                $('#totalItemCos').val(count);
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
                    ex_rate_cos = $('#exchangeRateCos').val();
                    // final_item_total_emkl = $('#finalTotalAmountEmkl').val();
                    // if (isNaN(final_item_total_emkl)
                    //     final_item_total_emkl = 0
                    // );
                    // console.log(final_item_total_emkl);
                    vol_cos = $('#volCos' + rowCos).val();
                    if (vol_cos > 0) {
                        price_cos = $('#priceCos' + rowCos).val();
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
                // console.log(final_item_total_ros);
                $('#finalTotalAmountExRateCos').val(final_item_total_ex_rate_cos.toFixed(4));
                // $('#grandTotalSelling').val(grand_total_selling.toFixed(4));
            }

            function grand_total() {
                var total_ros = $('#finalTotalAmountExRateRos').val();
                var total_emkl = $('#finalTotalAmountEmkl').val();
                var total_cos = $('#finalTotalAmountExRateCos').val();
                var total_hand = $('#finalTotalAmountHand').val();
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
            var finalTotalAmountHand = $('#finalTotalAmountHand').text();
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
                    '" class="form-control form-control-sm input-sm number_only rupiah priceHand" /></td>'
                html_code +=
                    '<td><input type="text" name="actualAmountHand[]" id="actualAmountHand' + count +
                    '" data-hand-no="' + count +
                    '" class="form-control form-control-sm input-sm actualAmountHand" readonly /></td>';

                html_code += '<td><input type="text" name="taxRateHand[]" id="taxRateHand' + count +
                    '" data-hand-no="' + count +
                    '" class="form-control form-control-sm input-sm number_only taxRateHand" /></td>';
                html_code += '<td><input type="text" name="taxAmountHand[]" id="taxAmountHand' + count +
                    '" data-hand-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm taxAmountHand" /></td>';

                html_code += '<td><input type="text" name="itemFinalAmountHand[]" id="itemFinalAmountHand' +
                    count + '" data-hand-no="' + count +
                    '" readonly class="form-control form-control-sm input-sm itemFinalAmountHand" /></td>';
                html_code += '<td><button type="button" name="remove_row_hand" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row_hand"><i class="fa fa-trash-alt"></i></button></td>';
                html_code += '</tr>';
                $('#tableHand').append(html_code);
            });

            $(document).on('click', '.remove_row_hand', function() {
                var row_id_hand = $(this).attr("id");
                var total_item_amount_hand = $('#itemFinalAmountHand' + row_id_hand).val();
                var final_amount_hand = $('#finalTotalAmountHand').val();
                var result_amount_hand = parseFloat(final_amount_hand) - parseFloat(total_item_amount_hand);
                $('#finalTotalAmountHand').val(result_amount_hand.toFixed(4));
                $('#row_id_hand_' + row_id_hand).remove();
                count--;
                $('#totalItemHand').val(count);
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
                        price_hand = $('#priceHand' + rowHand).val();
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
                var total_ros = $('#finalTotalAmountExRateRos').val();
                var total_emkl = $('#finalTotalAmountEmkl').val();
                var total_cos = $('#finalTotalAmountExRateCos').val();
                var total_hand = $('#finalTotalAmountHand').val();
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

    <!-- NUMBER ONLY -->
    <script>
        $(document).ready(function() {
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
        });
    </script>
    <!-- END NUMBER ONLY -->

    {{-- <!-- DOLLAR -->
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0,00", {
                reverse: true
            });
        });
    </script>
    <!-- END DOLLAR --> --}}
    {{-- <script>
        $(document).ready(function(){
            $(.rupiah).inputmask("99-9999999");  //static mask
            $(selector).inputmask({"mask": "(999) 999-9999"}); //specifying options
            $(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax
        });
    </script> --}}
@endsection

@endsection
