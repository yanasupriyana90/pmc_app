@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Selling Buying')

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
                <a class="btn btn-primary pull-right" href="#" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Job Sheet ID</th>
                            <th>Exchange Rate Ros</th>
                            <th>Exchange Rate Cos</th>
                            <th>Grand Total Selling</th>
                            <th>Grand Total Buying</th>
                            <th>Remaks</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellingBuyingList as $sellingBuying)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $sellingBuying->job_sheet_head_id }}</td>
                                <td class="align-middle">{{ $sellingBuying->exchange_rate_ros }}</td>
                                <td class="align-middle">{{ $sellingBuying->exchange_rate_cos }}</td>
                                <td class="align-middle">{{ $sellingBuying->grand_total_selling }}</td>
                                <td class="align-middle">{{ $sellingBuying->grand_total_buying }}</td>
                                <td class="align-middle">{{ $sellingBuying->remarks }}</td>
                                <td class="align-middle" style="text-align:center">{{ $jobSheetHead->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-eye"></i> Show Detail</a>
                                    <a class="btn btn-primary btn-xs" href="#"><i class="fa fa-exchange-alt"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs" href="#" id="delete"><i
                                            class="fa fa-trash"></i> Delete</a>
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
