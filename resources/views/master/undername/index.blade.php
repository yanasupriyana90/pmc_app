@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Undername')

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
                <a class="btn btn-primary pull-right" href="{{ Route('undername.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Undername</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Mandatory Tax</th>
                            <th>Tax ID</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($undernameList as $undername)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle" style="text-align:center">{{ $undername->code_undername }}</td>
                                <td class="align-middle">{{ $undername->name }}</td>
                                <td class="align-middle">{{ $undername->address }}</td>
                                <td class="align-middle">{{ $undername->phone_1 }}</td>
                                <td class="align-middle">{{ $undername->phone_2 }}</td>
                                <td class="align-middle">{{ $undername->fax }}</td>
                                <td class="align-middle">{{ $undername->email }}</td>
                                <td class="align-middle">{{ $undername->mandatoryTax['name'] }}</td>
                                <td class="align-middle">{{ $undername->tax_id }}</td>
                                <td class="align-middle" style="text-align:center">{{ $undername->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('undername.show', $undername->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('undername.destroy', $undername->id) }}"
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
