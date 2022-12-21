@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')

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
                <a class="btn btn-primary pull-right" href="{{ Route('jobSheet.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Job Sheet</th>
                            <th>Booking No</th>
                            <th>Shipper</th>
                            <th>Address</th>
                            <th>Phone 1</th>
                            <th>Undername</th>
                            <th>Consignee</th>
                            <th>Notify Party</th>
                            <th>Port Of Loading</th>
                            <th>ETD</th>
                            <th>Port Of Discharge</th>
                            <th>Shipping Line</th>
                            <th>Vessel's Name</th>
                            <th>Closing CY</th>
                            <th>Bill Of Lading</th>
                            <th>Desc Of Goods</th>
                            <th>Cont Size Type</th>
                            <th>Net Weight</th>
                            <th>Gross Weight</th>
                            <th>Measurement</th>
                            <th>Stuffing Date</th>
                            <th>Warehouse</th>
                            <th>Payment Info</th>
                            <th>Noted</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($typeCurrencyList as $typeCurrency)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $typeCurrency->code_currency }}</td>
                                <td class="align-middle">{{ $typeCurrency->name }}</td>
                                <td class="align-middle" style="text-align:center">{{ $typeCurrency->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('typeCurrency.show', $typeCurrency->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('typeCurrency.destroy', $typeCurrency->id) }}"
                                        id="delete"><i class="fa fa-trash"></i> Delete</a>
                                </td>

                            </tr>
                        @endforeach --}}
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
