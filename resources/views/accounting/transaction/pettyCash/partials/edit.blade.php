@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Petty Cash')
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
                            <li class="breadcrumb-item"><a href="{{ route('pettyCash') }}">@yield('subtitle')</a></li>
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
                            <form action="{{ route('pettyCash.update', $pettyCash->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control text-uppercase" name="name"
                                            id="name" value="{{ $pettyCash->name }}" placeholder="Enter Name" required>
                                    </div> --}}

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputNoTrans">No Trans</label>
                                                    <input type="text"
                                                        class="form-control form-control-sm text-uppercase" name="no_trans"
                                                        id="no_trans" value="{{ $pettyCash->no_trans }}"
                                                        readonly>
                                                </div>

                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Date Transaction</label>
                                                    <div class="input-group date" id="date_trans"
                                                        data-target-input="nearest">
                                                        <input type="text" name="date_trans"
                                                            value="{{ $pettyCash->date_trans }}"
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
                                                        value="{{ $pettyCash->desc }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputDebit">Debit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="debit"
                                                        id="debit" placeholder="0" value="{{ $pettyCash->debit }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputCredit">Credit</label>
                                                    <input type="number"
                                                        class="form-control form-control-sm text-uppercase" name="credit"
                                                        id="credit" placeholder="0" value="{{ $pettyCash->credit }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="inputBankAccount">Bank Account</label>
                                                    <select name="bank_account_id" id="bank_account_id"
                                                        class="form-control form-control-sm select2" style="width: 100%;">
                                                        @foreach ($bankAccount as $item)
                                                            <option value="{{ $item->id }}">
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
                                                    <textarea class="form-control form-control-sm text-uppercase" name="remarks" id="remarks" rows="3">{{ $pettyCash->remarks }}</textarea>
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
                                                            <label class="custom-file-label" for="trans_doc">{{ $pettyCash->trans_doc }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control" name="user_id" id="user_id"
                                        value="{{ Auth::user()->id }}" placeholder="">

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                        <a class="btn btn-danger" href="{{ route('pettyCash') }}"
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
