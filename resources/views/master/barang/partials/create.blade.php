@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Barang')

@section('subtitle_2', 'Add Data')

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
                            <form action="{{ Route('barang.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputSku">SKU</label>
                                                <input type="text" class="form-control form-control-sm" name="sku"
                                                    id="sku" value="{{ old('sku') }}" placeholder="Enter SKU">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputNama">Nama</label>
                                                <input type="text" class="form-control form-control-sm" name="nama"
                                                    id="nama" value="{{ old('nama') }}"
                                                    placeholder="Enter Nama Barang">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputMerk">Merk</label>
                                                <input type="text" class="form-control form-control-sm" name="merk"
                                                    id="merk" value="{{ old('merk') }}"
                                                    placeholder="Enter Merk Barang">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputPanjang">P (cm)</label>
                                                <input type="text" class="form-control form-control-sm" name="panjang"
                                                    id="panjang" value="{{ old('panjang') }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputLebar">L (cm)</label>
                                                <input type="text" class="form-control form-control-sm" name="lebar"
                                                    id="lebar" value="{{ old('lebar') }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputTinggi">T (cm)</label>
                                                <input type="text" class="form-control form-control-sm" name="tinggi"
                                                    id="tinggi" value="{{ old('tinggi') }}" placeholder="0.0">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label for="inputQty">Qty</label>
                                                <input type="text" class="form-control form-control-sm" name="qty"
                                                    id="qty" value="{{ old('qty') }}" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inputSatuanBarang">Satuan</label>
                                                <select name="satuan_barang_id" id="satuan_barang_id"
                                                    class="form-control form-control-sm select2" style="width: 100%;"
                                                    onchange="showDiv(this)">
                                                    @foreach ($barang as $item)
                                                        <option value="{{ old('mandatory_tax_id', $item->id) }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDesk">Deskripsi</label>
                                        <textarea class="form-control form-control-sm text-uppercase" name="desk" id="desk"
                                            placeholder="Enter Deskripsi">{{ old('desk') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputNama">USD</label>
                                                <input type="text" class="form-control form-control-sm" name="nama"
                                                    id="nama" value="{{ old('nama') }}"
                                                    placeholder="Enter Nama Barang">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputExchangeRate">Exchange Rate</label>
                                                <input type="text" class="form-control form-control-sm" name="exchange_rate"
                                                    id="exchange_rate" value="{{ old('exchange_rate') }}"
                                                    placeholder="Enter Rate">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputIdr">IDR</label>
                                                <input type="text" class="form-control form-control-sm" name="idr"
                                                    id="idr" value="{{ old('idr') }}"
                                                    placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="inputMerk">Status</label>
                                                <input type="text" class="form-control form-control-sm" name="merk"
                                                    id="merk" value="{{ old('merk') }}"
                                                    placeholder="Enter Merk Barang">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control form-control-sm" name="user_id"
                                        id="user_id" value="{{ Auth::user()->id }}">

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary mr-3" type="submit">SAVE</button>
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
@endsection

<script>
    function showDiv(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id').value = "";
            document.getElementById('tax_id_group').style.display = "block";
        } else {
            document.getElementById('tax_id_group').style.display = "none";
        }
    }
</script>

{{-- <script>
    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
    });
</script> --}}

{{-- Block Enter Key --}}
<script type="text/javascript">
    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type == "text")) {
            return false;
        }
    }

    document.onkeypress = stopRKey;
</script>
