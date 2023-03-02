@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Daily Sales Report')
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
                            <li class="breadcrumb-item"><a href="{{ route('dailySalesReport') }}">@yield('subtitle')</a></li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ Route('dailySalesReport.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputCodeShipper">Code Daily Sales Report</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase"
                                                        name="code_daily_sales_report" id="code_daily_sales_report"
                                                        {{-- value="{{ 'DSR-' . date('mdy') . '-' . Auth::user()->id }}" readonly> --}}
                                                        value="{{ 'DSR-' . date('mdy') . '-' . Auth::user()->id }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Date :</label>
                                                    <div class="input-group date" id="date_report"
                                                        data-target-input="nearest">
                                                        <input type="text" name="date_report"
                                                            value="{{ old('date_report') }}"
                                                            class="form-control form-control-sm datetimepicker-input"
                                                            data-target="#date_report" />
                                                        <div class="input-group-append" data-target="#date_report"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <hr size="100" noshade>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputShipper">Shipper</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase"
                                                        name="shipper" id="shipper"
                                                        value="{{ old('shipper') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="inputPicName">PIC Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="pic_name" id="pic_name"
                                                        value="{{ old('pic_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputPhone1">Phone 1</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="phone_1" id="phone_1"
                                                        value="{{ old('phone_1') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputPhone2">Phone 2</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="phone_2" id="phone_2"
                                                        value="{{ old('phone_2') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputFax">Fax</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="fax" id="fax"
                                                        value="{{ old('fax') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <textarea class="form-control form-control-sm text-uppercase" name="address" id="address" rows="3">{{ old('address') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputEmail">Email address</label>
                                                    <input type="email" class="form-control form-control-sm"
                                                        name="email" id="email"
                                                        value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="inputWebsite">Website</label>
                                                    <input type="website" class="form-control form-control-sm"
                                                        name="website" id="website"
                                                        value="{{ old('website') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputRemarks">Remarks</label>
                                                    <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="6">{{ old('remarks') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputStatus">Status</label>
                                                    <input type="status" class="form-control form-control-sm"
                                                        name="status" id="status"
                                                        value="{{ old('status') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr size="100" noshade>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control form-control-sm" name="user_id"
                                        id="user_id" value="{{ Auth::user()->id }}" placeholder="">

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                        <a href="{{ route('dailySalesReport') }}" class="btn btn-danger"
                                            type="button">CANCEL</a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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
