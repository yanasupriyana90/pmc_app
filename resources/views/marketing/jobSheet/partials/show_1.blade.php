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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Code</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="code_js"
                                            value="{{ $jobSheetHead->code_js }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">No Booking</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" id="booking_no"
                                            value="{{ $jobSheetHead->booking_no }}">
                                    </div>
                                </div>
                                <hr size="100" noshade>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Shipper ID</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_id"
                                            id="shipper_id" value="{{ $jobSheetHead->shipper_id }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Shipper</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_name"
                                            id="shipper_name" value="{{ $jobSheetHead->shipper['name'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control-plaintext" name="shipper_address" id="shipper_address" cols="30" rows="3"
                                            readonly>{{ $jobSheetHead->shipper['address'] }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Phone 1</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_phone_1"
                                            id="shipper_phone_1" value="{{ $jobSheetHead->shipper['phone_1'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Phone 2</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_phone_2"
                                            id="shipper_phone_2" value="{{ $jobSheetHead->shipper['phone_2'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Fax</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_fax"
                                            id="shipper_fax" value="{{ $jobSheetHead->shipper['fax'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_email"
                                            id="shipper_email" value="{{ $jobSheetHead->shipper['email'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Mandatory Tax -> {{ $jobSheetHead->shipper['mandatory_tax_id'] }}</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_tax_id"
                                            id="shipper_tax_id" value="{{ $jobSheetHead->shipper['tax_id'] }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="shipper_email"
                                            id="shipper_email" value="{{ $jobSheetHead->shipper['email'] }}">
                                    </div>
                                </div>
                                <hr size="100" noshade>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Undername MBL ID</label>
                                    <label class="col-sm-0 col-form-label">:</label>
                                    <div class="col-sm-3">
                                        <input type="text" readonly class="form-control-plaintext" name="undername_mbl_id"
                                            id="undername_mbl_id" value="{{ $jobSheetHead->undername_mbl_id }}">
                                    </div>
                                </div>
                                {{-- <div class="row invoice-info">
                                    <div class="col-sm-4">
                                        Shipper :
                                        <address>
                                            <strong>{{ $jobSheetHead->shipper['name'] }}</strong><br>
                                            {{ $jobSheetHead->shipper['address'] }}<br>
                                            Phone 1 : {{ $jobSheetHead->shipper['phone_1'] }}<br>
                                            Phone 2 : {{ $jobSheetHead->shipper['phone_2'] }}<br>
                                            Email: info@almasaeedstudio.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>John Doe</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            Phone: (555) 539-1037<br>
                                            Email: john.doe@example.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #007612</b><br>
                                        <br>
                                        <b>Order ID:</b> 4F3S8J<br>
                                        <b>Payment Due:</b> 2/22/2014<br>
                                        <b>Account:</b> 968-34567
                                    </div>
                                    <!-- /.col -->
                                </div> --}}
                            </div>
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
