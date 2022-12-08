@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'User')

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
        <div class="my-1">
            <a href="#" button type="button" class="btn btn-primary">Add Data</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td class="text-center">
                            <a href="#" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                                Edit</a>
                            <a href="#" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                Hapus</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
