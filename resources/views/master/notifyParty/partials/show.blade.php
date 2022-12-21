@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Notify Party')
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
                            <li class="breadcrumb-item"><a href="{{ route('notifyParty') }}">@yield('subtitle')</a></li>
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
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputCodeNotifyParty">Code Notify Party</label>
                                                <input type="text" name="code_notify_party" class="form-control form-control-sm"
                                                    id="code_notify_party" value="{{ $notifyParty->code_notify_party }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm" id="name"
                                            value="{{ $notifyParty->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <textarea class="form-control form-control-sm" name="address" id="address" disabled>{{ $notifyParty->address }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_1">Phone 1</label>
                                                <input type="text" name="phone_1" class="form-control form-control-sm" id="phone_1"
                                                    value="{{ $notifyParty->phone_1 }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_2">Phone 2</label>
                                                <input type="text" name="phone_2" class="form-control form-control-sm" id="phone_2"
                                                    value="{{ $notifyParty->phone_2 }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputFax">Fax</label>
                                                <input type="text" name="fax" class="form-control form-control-sm" id="fax"
                                                    value="{{ $notifyParty->fax }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input type="email" name="email" class="form-control form-control-sm" id="email"
                                                    value="{{ $notifyParty->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputNPWP">{{ $notifyParty->mandatoryTax['name'] }}</label>
                                                <input type="text" name="tax_id" class="form-control form-control-sm" id="tax_id"
                                                    value="{{ $notifyParty->tax_id }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('notifyParty') }}" class="btn btn-success mr-3" type="button">OK</a>
                                        <a class="btn btn-primary" href="{{ route('notifyParty.edit', $notifyParty->id) }}"><i
                                                class="fa fa-edit"></i> Edit</a>
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
