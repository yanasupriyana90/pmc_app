@extends('admin.panel')

@section('title', 'Accounting')

@section('subtitle', 'Cash In Bank')

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
                            <li class="breadcrumb-item active">@yield('subtitle')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <a class="btn btn-primary pull-right mr-4" href="{{ Route('cashInBank.createReceivable') }}" role="button"><i
                            class="fa fa-plus"></i> Receivable</a>
                    <a class="btn btn-danger pull-right" href="{{ Route('cashInBank.createPayable') }}" role="button"><i class="fa fa-minus"></i>
                        Payable</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Trans</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Bank Account</th>
                            <th>Trans Doc</th>
                            <th>Remarks</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashInBankList as $cashInBank)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $cashInBank->no_trans }}</td>
                                <td class="align-middle">{{ date('d/m/Y', strtotime($cashInBank->date_trans)) }}</td>
                                <td class="align-middle">{{ $cashInBank->desc }}</td>
                                <td class="align-middle">Rp. {{ number_format($cashInBank->debit) }}</td>
                                <td class="align-middle">Rp. {{  number_format($cashInBank->credit) }}</td>
                                <td class="align-middle">{{ $cashInBank->bankAccount['name_bank'] }}</td>
                                <td class="align-middle">
                                    <a href="{{ asset('trans_doc/' . $cashInBank->trans_doc) }}" target="_blank"
                                        rel="nooperner noreferrer">{{ $cashInBank->trans_doc }}</a>
                                </td>
                                <td class="align-middle">{{ $cashInBank->remarks }}</td>
                                {{-- <td class="align-middle">{{ $cashInbank->trans_doc }}</td> --}}
                                <td class="align-middle" style="text-align:center">{{ $cashInBank->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('cashInBank.show', $cashInBank->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('cashInBank.destroy', $cashInBank->id) }}"
                                        id="delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
