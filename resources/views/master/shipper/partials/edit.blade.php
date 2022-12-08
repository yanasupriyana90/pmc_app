@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Shipper')
@section('subtitle_2', 'Edit Data')

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
                            <li class="breadcrumb-item"><a href="{{ route('shipper') }}">@yield('subtitle')</a></li>
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
                            <form action="{{ route('shipper.update', $shipper->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputCodeShipper">Code Shipper</label>
                                                <input type="text" class="form-control text-uppercase"
                                                    name="code_shipper" id="code_shipper"
                                                    value="{{ $shipper->code_shipper }}" placeholder="Enter Code Shipper"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control text-uppercase" name="name"
                                            id="name" value="{{ $shipper->name }}" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <textarea class="form-control text-uppercase" name="address" id="address" placeholder="Enter Address">{{ $shipper->address }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_1">Phone 1</label>
                                                <input type="number" class="form-control" name="phone_1" id="phone_1"
                                                    value="{{ $shipper->phone_1 }}" placeholder="Enter Phone 1">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_2">Phone 2</label>
                                                <input type="number" class="form-control" name="phone_2" id="phone_2"
                                                    value="{{ $shipper->phone_2 }}" placeholder="Enter Phone 2">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFax">Fax</label>
                                                <input type="number" class="form-control" name="fax" id="fax"
                                                    value="{{ $shipper->fax }}" placeholder="Enter Fax">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ $shipper->email }}" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputNPWP">NPWP</label>
                                                <input type="number" class="form-control" name="npwp" id="npwp"
                                                    value="{{ $shipper->npwp }}" placeholder="Enter NPWP">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control" name="user_id" id="user_id"
                                        value="{{ Auth::user()->id }}" placeholder="">

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                        <a class="btn btn-danger" href="{{ route('shipper') }}"
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
