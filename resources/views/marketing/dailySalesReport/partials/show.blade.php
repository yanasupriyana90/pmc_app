@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Daily Sales Report')
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
                            <li class="breadcrumb-item"><a href="{{ route('dailySalesReport') }}">@yield('subtitle')</a></li>
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
                            <div class="card-body">
                                <div class="container">
                                    <div class="row mb-4">
                                        <a class="btn btn-primary pull-right" href="{{ Route('dailySalesReport') }}" role="button"><i
                                        class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code Daily Sales Report</th>
                                            <th>Shipper</th>
                                            <th>Commodity</th>
                                            <th>Status</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dailySalesReportList as $dailySalesReport)
                                            <tr>
                                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $dailySalesReport->code_daily_sales_report }}</td>
                                                <td class="align-middle">{{ $dailySalesReport->shipper }}</td>
                                                <td class="align-middle">{{ $dailySalesReport->commodity }}</td>
                                                <td class="align-middle">{{ $dailySalesReport->status }}</td>
                                                <td class="align-middle" style="text-align:center">{{ $dailySalesReport->user['name'] }}</td>
                                                <td class="align-middle" style="text-align:center">
                                                    <a class="btn btn-primary btn-xs" href="{{ route('dailySalesReport.show', $dailySalesReport->id) }}"><i
                                                            class="fa fa-eye"></i> Detail & Edit</a>
                                                    <a class="btn btn-danger btn-xs" href="{{ route('dailySalesReport.destroy', $dailySalesReport->id) }}"
                                                        id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
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
