@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Type Measurement')

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
                <a class="btn btn-primary pull-right" href="{{ Route('typeMeasurement.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Measurement</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeMeasurementList as $typeMeasurement)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $typeMeasurement->code_measurement }}</td>
                                <td class="align-middle">{{ $typeMeasurement->name }}</td>
                                <td class="align-middle" style="text-align:center">{{ $typeMeasurement->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('typeMeasurement.show', $typeMeasurement->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('typeMeasurement.destroy', $typeMeasurement->id) }}"
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
