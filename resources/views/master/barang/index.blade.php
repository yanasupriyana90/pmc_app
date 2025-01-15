@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Barang')

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
            <a href="{{ route('barang.create') }}" class="btn btn-primary pull-right" role="button"><i class="fa fa-plus"></i> Add Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>SKU</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>P</th>
                        <th>L</th>
                        <th>T</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Desk</th>
                        <th>Pic</th>
                        <th>USD</th>
                        <th>Rate</th>
                        <th>IDR</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangList as $barang)
                    <tr>
                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->sku }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->nama }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->merk }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->panjang }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->lebar }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->tinggi }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->qty }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->satuanBarang['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->desk }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->pic }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->usd }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->exchange_rate }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->idr }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->status }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->user['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($barang->created_at)->format('l, d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($barang->updated_at)->format('l, d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: center">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail & Edit</a>
                            <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
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
