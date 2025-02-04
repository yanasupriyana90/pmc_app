@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Kategori Barang')

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

    <!-- Main Content -->

    <div class="card">
        <div class="card-header">
            <a href="{{ Route('kategoriBarang.create') }}" class="btn btn-primary pull-right" role="button"><i class="fa fa-plus"></i> Add Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>User</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoriBarangList as $kategoriBarang)
                    <tr>
                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                        <td class="align-middle" style="text-align: center">{{ $kategoriBarang->name }}</td>
                        <td class="align-middle" style="text-align: center">
                            <a href="{{ route('kategoriBarang.show', $kategoriBarang->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail & Edit</a>
                            <a href="{{ route('kategoriBarang.destroy', $kategoriBarang->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        <td class="align-middle" style="text-align: center">{{ $kategoriBarang->user['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($kategoriBarang->created_at)->format('l, d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($kategoriBarang->updated_at)->format('l, d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
