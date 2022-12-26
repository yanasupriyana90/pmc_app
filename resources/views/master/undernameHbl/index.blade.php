@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Undername H-BL / PEB')

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
                <a class="btn btn-primary pull-right" href="{{ Route('undernameHbl.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Undername Hbl</th>
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
                        @foreach ($undernameHblList as $undernameHbl)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle" style="text-align:center">{{ $undernameHbl->code_undername_mbl }}</td>
                                <td class="align-middle">{{ $undernameHbl->name }}</td>
                                <td class="align-middle">{{ $undernameHbl->address }}</td>
                                <td class="align-middle">{{ $undernameHbl->phone_1 }}</td>
                                <td class="align-middle">{{ $undernameHbl->phone_2 }}</td>
                                <td class="align-middle">{{ $undernameHbl->fax }}</td>
                                <td class="align-middle">{{ $undernameHbl->email }}</td>
                                <td class="align-middle">{{ $undernameHbl->mandatoryTax['name'] }}</td>
                                <td class="align-middle">{{ $undernameHbl->tax_id }}</td>
                                <td class="align-middle" style="text-align:center">{{ $undernameHbl->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('undernameHbl.show', $undernameHbl->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('undernameHbl.destroy', $undernameHbl->id) }}"
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
