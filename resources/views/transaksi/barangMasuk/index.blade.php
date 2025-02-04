@extends('admin.panel')

@section('title', 'Transaksi')

@section('subtitle', 'Barang Masuk')

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
            <a href="{{ route('barangMasuk.create') }}" class="btn btn-primary pull-right" role="button"><i class="fa fa-plus"></i> Add Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Vendor</th>
                        <th>No Invoice</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                        <th>User</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangMasukList as $barangMasuk)
                    <tr>
                        <td class="align-middle" style="text-align: center">{{ $loop->iteration }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->vendor['name'] }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->nomor_invoice }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->tanggal_pembelian }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->total_harga }}</td>
                        <td class="align-middle" style="text-align: center">{{ $barang->keterangan }}</td>
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

    <script>
        $(document).ready(function() {
            // Terapkan Inputmask ke input dengan kelas "rupiah"
            $(".rupiahBarang").inputmask({
                alias: 'currency',
                prefix: 'Rp ', // You can set the currency symbol here, e.g., '$'
                suffix: '', // You can set a suffix here, e.g., ' USD'
                groupSeparator: '.', // Set the group separator, e.g., for thousands
                // radixPoint: ',',  // Set the group separator, e.g., for thousands
                digits: 2, // Set the number of decimal digits
                autoGroup: true, // Automatically groups thousands
                rightAlign: false, // Align the currency symbol to the left
                removeMaskOnSubmit: true,
            });

            $(".dollarBarang").inputmask({
                alias: 'currency',
                prefix: '$ ', // You can set the currency symbol here, e.g., '$'
                suffix: '', // You can set a suffix here, e.g., ' USD'
                groupSeparator: '.', // Set the group separator, e.g., for thousands
                // radixPoint: ',',  // Set the group separator, e.g., for thousands
                digits: 2, // Set the number of decimal digits
                autoGroup: true, // Automatically groups thousands
                rightAlign: false, // Align the currency symbol to the left
                removeMaskOnSubmit: true,
            });

            // Fungsi untuk menghitung total harga
            function hitungTotal() {
                let harga_modal_usd = $("#harga_modal_usd").inputmask('unmaskedvalue') || 0;
                let exchange = $("#exchange").inputmask('unmaskedvalue') || 0;
                let harga_modal_idr = harga_modal_usd * exchange;

                // Format kembali total ke dalam format rupiah
                $("#harga_modal_idr").val(harga_modal_idr).inputmask("setvalue", harga_modal_idr);
            }

            // Event listener untuk perhitungan otomatis
            $("#harga_modal_usd, #exchange").on("input", function() {
                hitungTotal();
            });
        });
    </script>

@endsection
@endsection
