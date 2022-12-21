@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Consignee')

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
                <a class="btn btn-primary pull-right" href="{{ Route('consignee.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Consignee</th>
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
                        @foreach ($consigneeList as $consignee)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle" style="text-align:center">{{ $consignee->code_consignee }}</td>
                                <td class="align-middle">{{ $consignee->name }}</td>
                                <td class="align-middle">{{ $consignee->address }}</td>
                                <td class="align-middle">{{ $consignee->phone_1 }}</td>
                                <td class="align-middle">{{ $consignee->phone_2 }}</td>
                                <td class="align-middle">{{ $consignee->fax }}</td>
                                <td class="align-middle">{{ $consignee->email }}</td>
                                <td class="align-middle">{{ $consignee->mandatoryTax['name'] }}</td>
                                <td class="align-middle">{{ $consignee->tax_id }}</td>
                                <td class="align-middle" style="text-align:center">{{ $consignee->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('consignee.show', $consignee->id) }}"><i
                                            class="fa fa-eye"></i> Detail & Edit</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('consignee.destroy', $consignee->id) }}"
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
