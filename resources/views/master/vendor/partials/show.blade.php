@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Vendor')

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
                            <li class="breadcrumb-item"><a href="{{ route('vendor') }}">@yield('subtitle')</a></li>
                            <li class="breadcrumb-item active">@yield('subtitle_2')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Initial Code</label>
                                                <input type="text" name="initial_code"
                                                    class="form-control form-control-sm" id="initial_code"
                                                    value="{{ $vendor->initial_code }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm"
                                            id="name" value="{{ $vendor->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control form-control-sm" name="address" id="address" disabled>{{ $vendor->address }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phone 1</label>
                                                <input type="text" name="phone_1" class="form-control form-control-sm"
                                                    id="phone_1" value="{{ $vendor->phone_1 }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input type="text" name="phone_2" id="phone_2"
                                                    class="form-control form-control-sm" value="{{ $vendor->phone_2 }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="clo-4">
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" name="fax" class="form-control form-control-sm"
                                                    id="fax" value="{{ $vendor->fax }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" name="email" class="form-control form-control-sm"
                                                    id="email" value="{{ $vendor->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>{{ $vendor->mandatoryTax['name'] }}</label>
                                                <input type="text" name="tax_id" class="form-control form-control-sm"
                                                    id="tax_id" value="{{ $vendor->tax_id }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Created Date</label>
                                                <input type="text" name="created_at" class="form-control form-control-sm"
                                                    id="created_at"
                                                    value="{{ $vendor->created_at->format('l, d-m-Y H:i') }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Modified Date</label>
                                                <input type="text" name="updated_at" class="form-control form-control-sm"
                                                    id="updated_at"
                                                    value="{{ $vendor->updated_at->format('l, d-m-Y H:i') }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('vendor') }}" class="btn btn-success mr-3" type="button"><i
                                                class="fa fa-check"> OK</i></a>
                                        <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
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
