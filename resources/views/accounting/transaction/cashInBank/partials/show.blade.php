@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Cash In Bank')
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
                            <li class="breadcrumb-item"><a href="{{ route('cashInBank') }}">@yield('subtitle')</a></li>
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
                                    {{-- <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $cashInBank->name }}" disabled>
                                    </div> --}}

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputNoTrans">No Trans</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="no_trans"
                                                        id="no_trans" value="{{ $cashInBank->no_trans }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputDateTrans">Date Transaction</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="date_trans"
                                                        id="date_trans" value="{{ $cashInBank->date_trans }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="inputDesc">Description</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="desc"
                                                        id="desc" placeholder="Enter Description"
                                                        value="{{ $cashInBank->desc }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputDebit">Debit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="debit"
                                                        id="debit" placeholder="0" value="{{ $cashInBank->debit }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputCredit">Credit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="credit"
                                                        id="credit" placeholder="0" value="{{ $cashInBank->credit }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputDateTrans">Bank Account</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="date_trans"
                                                        id="date_trans" value="{{ $cashInBank->bankAccount['name_bank'] }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputRemarks">Remarks</label>
                                                    <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="3" readonly>{{ $cashInBank->remarks }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputTransDoc">Transaction Document :</label>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <strong><a href="{{ asset('trans_doc/' . $cashInBank->trans_doc) }}" target="_blank"
                                                                rel="nooperner noreferrer">{{ $cashInBank->trans_doc }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputNoAccount">No Account</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="no_account"
                                                        id="no_account" readonly value="{{ $item->name_bank }}">
                                                </div>
                                            </div> --}}

                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('cashInBank') }}" class="btn btn-success" type="button">OK</a>
                                        <a class="btn btn-primary" href="{{ route('cashInBank.edit', $cashInBank->id) }}"><i
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
