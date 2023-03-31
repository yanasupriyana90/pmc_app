@extends('admin.panel')

@section('title', 'Accouting')

@section('subtitle', 'Cash In Bank')
@section('subtitle_2', 'Payable')

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
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('cashInBank.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputNoTrans">No Trans</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="no_trans"
                                                        id="no_trans" value="{{ 'AP-' . date('dmy') . '-' . $kd }}"
                                                        readonly>
                                                </div>

                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Date Transaction</label>
                                                    <div class="input-group date" id="date_trans"
                                                        data-target-input="nearest">
                                                        <input type="text" name="date_trans"
                                                            value="{{ old('date_trans') }}"
                                                            class="form-control form-control-sm datetimepicker-input"
                                                            data-target="#date_trans" />
                                                        <div class="input-group-append" data-target="#date_trans"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                        value="{{ old('desc') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputDebit">Debit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="debit"
                                                        id="debit" placeholder="0.00">
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputCredit">Credit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="credit"
                                                        id="credit" placeholder="0">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputBankAccount">Bank Account</label>
                                                    <select name="bank_account_id" id="bank_account_id"
                                                        class="form-control form-control-sm select2" style="width: 100%;">
                                                        @foreach ($bankAccount as $item)
                                                            <option value="{{ old('bank_account_id', $item->id) }}">
                                                                {{ $item->name_bank }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputRemarks">Remarks</label>
                                                    <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="3">{{ old('remarks') }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputTransDoc">Transaction Document</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="trans_doc"
                                                                name="trans_doc">
                                                            <label class="custom-file-label" for="trans_doc">Choose
                                                                File</label>
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
                                    <div class="container">
                                        {{-- Hidden User --}}
                                        <input type="hidden" class="form-control" name="user_id" id="user_id"
                                            value="{{ Auth::user()->id }}" placeholder="">

                                        <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-primary" type="submit">SAVE</button>
                                            <a href="{{ route('cashInBank') }}" class="btn btn-danger"
                                                type="button">CANCEL</a>
                                        </div>
                                    </div>
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
