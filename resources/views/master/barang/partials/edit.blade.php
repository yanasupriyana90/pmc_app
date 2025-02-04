@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Barang')

@section('subtitle_2', 'Edit Data')

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
                            <li class="breadcrumb-item"><a href="{{ route('barang') }}">@yield('subtitle')</a></li>
                            <li class="breadcrumb-item active">@yield('subtitle_2')</li>
                        </ol>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputKodeBarang">Kode Barang</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase"
                                                    name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
                                                    placeholder="Enter Kode Barang" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputNama">Nama</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase"
                                                    name="nama" id="nama" value="{{ old('nama', $barang->nama) }}"
                                                    placeholder="Enter Nama Barang">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control form-control-sm select2" name="kategori_barang_id" id="kategori_barang_id"
                                                    style="width: 100%;" onchange="showDiv(this)">
                                                    <option value="{{ old('kategori_barang_id', $barang->kategoriBarang->id) }}">{{ $barang->kategoriBarang->name }}</option>
                                                    @foreach ($kategoriBarang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputPanjang">P (cm)</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control form-control-sm" name="panjang" id="panjang"
                                                    value="{{ old('panjang', $barang->panjang) }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputLebar">L (cm)</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control form-control-sm" name="lebar" id="lebar"
                                                    value="{{ old('lebar', $barang->lebar) }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputTinggi">T (cm)</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control form-control-sm" name="tinggi" id="tinggi"
                                                    value="{{ old('tinggi', $barang->tinggi) }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <select class="form-control form-control-sm select2" name="satuan_barang_id" id="satuan_barang_id"
                                                    style="width: 100%;" onchange="showDiv(this)">
                                                    <option value="{{ old('satuan_barang_id', $barang->satuanBarang->id) }}">{{ $barang->satuanBarang->name }}</option>
                                                    @foreach ($satuanBarang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputMerk">Merk</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase"
                                                    name="merk" id="merk" value="{{ old('merk', $barang->merk) }}"
                                                    placeholder="Enter Merk Barang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDesk">Deskripsi</label>
                                        <textarea class="form-control form-control-sm text-uppercase" name="desk" id="desk"
                                            placeholder="Enter Deskripsi">{{ old('desk', $barang->desk) }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inputHargaModalUsd">Harga Modal (USD)</label>
                                                <input type="text" class="form-control form-control-sm dollarBarang"
                                                    name="harga_modal_usd" id="harga_modal_usd"
                                                    value="{{ old('harga_modal_usd', $barang->harga_modal_usd) }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inputExchangeRate">Exchange Rate</label>
                                                <input type="text" class="form-control form-control-sm rupiahBarang"
                                                    name="exchange" id="exchange" value="{{ old('exchange', $barang->exchange) }}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inputHargaModalIdr">Harga Modal (IDR)</label>
                                                <input type="text" class="form-control form-control-sm rupiahBarang"
                                                    name="harga_modal_idr" id="harga_modal_idr"
                                                    value="{{ old('harga_modal_idr', $barang->harga_modal_idr) }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inputHargaJual">Harga Jual</label>
                                                <input type="text" class="form-control form-control-sm rupiahBarang"
                                                    name="harga_jual" id="harga_jual" value="{{ old('harga_jual', $barang->harga_jual) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input type="number" min="0" class="form-control form-control-sm"
                                                    name="stock" id="stock" value="{{ old('stock', $barang->stock) }}"
                                                    placeholder="0" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Min Stock</label>
                                                <input type="number" min="0" class="form-control form-control-sm"
                                                    name="min_stock" id="min_stock" value="{{ old('min_stock', $barang->min_stock) }}"
                                                    placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="font-weight-bold">GAMBAR</label>
                                        <input type="file" class="form-control" name="image">
                                    </div> --}}
                                    <div class="form-group">
                                        <img src="{{ Storage::url('public/images/').$barang->image }}" width="150px">
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image">
                                                        <label class="custom-file-label" for="image">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control form-control-sm" name="user_id"
                                        id="user_id" value="{{ Auth::user()->id }}">

                                        <div class="d-grip gap-2 d-md-block">
                                            <button class="btn btn-primary mr-3" type="submit">UPDATE</button>
                                            <a href="{{ route('barang') }}" class="btn btn-danger" type="button">CANCEL</a>
                                        </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
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
