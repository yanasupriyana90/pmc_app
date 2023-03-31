@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Bank Account')
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
                            <li class="breadcrumb-item"><a href="{{ route('bankAccount') }}">@yield('subtitle')</a></li>
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
                                    <div class="form-group">
                                        <label for="inputNameBank">Bank Name</label>
                                        <input type="text" name="name_bank" class="form-control" id="name_bank"
                                            value="{{ $bankAccount->name_bank }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAccountNo">Account No</label>
                                        <input type="text" class="form-control text-uppercase" name="no_account"
                                            id="no_account" value="{{ $bankAccount->no_account }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAccountName">Account Name</label>
                                        <input type="text" class="form-control text-uppercase" name="name_account"
                                            id="name_account" value="{{ $bankAccount->name_account }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSaldo">Saldo</label>
                                        <input type="number" class="form-control text-uppercase" name="saldo"
                                            id="saldo" value="{{ $bankAccount->saldo }}" disabled>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('bankAccount') }}" class="btn btn-success" type="button">OK</a>
                                        <a class="btn btn-primary" href="{{ route('bankAccount.edit', $bankAccount->id) }}"><i
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
