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
                        <th>Image</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>P</th>
                        <th>L</th>
                        <th>T</th>
                        <th>Stock</th>
                        <th>Min Stock</th>
                        <th>Satuan</th>
                        <th>Harga Modal USD</th>
                        <th>Exchange</th>
                        <th>Harga Modal IDR</th>
                        <th>Harga Jual</th>
                        <th>Desk</th>
                        <th>Action</th>
                        <th>User</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangList as $barang)
                    <tr>
                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                        <td><img src="{{ Storage::url('public/images/').$barang->image }}" class="product-image-thumb" style="width:200px" /></td>
                        <td class="align-middle" style="text-align: center">{{ $barang->kode_barang }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->nama }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->kategoriBarang['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->merk }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->panjang }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->lebar }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->tinggi }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->stock }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->min_stock }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->satuanBarang['name'] }}</td>
                        <td class="align-middle dollarBarang" style="text-align: center">{{"$ " . number_format($barang->harga_modal_usd, 2, '.', ',') }}</td>
                        <td class="align-middle rupiahBarang" style="text-align: center">{{"Rp " . number_format($barang->exchange, 2, '.', ',') }}</td>
                        <td class="align-middle rupiahBarang" style="text-align: center">{{"Rp " . number_format($barang->harga_modal_idr, 2, '.', ',') }}</td>
                        <td class="align-middle rupiahBarang" style="text-align: center">{{"Rp " . number_format($barang->harga_jual, 2, '.', ',') }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->desk }}</td>
                        <td class="align-middle" style="text-align: center">
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail & Edit</a>
                            <a href="{{ route('barang.destroy', $barang->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        <td class="align-middle" style="text-align: center">{{ $barang->user['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($barang->created_at)->format('l, d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: center">{{ ($barang->updated_at)->format('l, d-m-Y H:i') }}</td>
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

@section('scriptCreateBarang')
    <!-- Handle Enter Jadi Tab -->
    <script>
        document.addEventListener("keydown", function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                var formInputs = document.querySelectorAll("input, select, textarea");
                var currentFocused = document.activeElement;
                var currentIndex = Array.from(formInputs).indexOf(currentFocused);

                if (currentIndex > -1 && currentIndex < formInputs.length - 1) {
                    formInputs[currentIndex + 1].focus();
                }
            }
        });
    </script>


@endsection
@endsection
