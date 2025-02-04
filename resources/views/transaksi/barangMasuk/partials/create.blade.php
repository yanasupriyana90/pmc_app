@extends('admin.panel')

@section('title', 'Transaksi')

@section('subtitle', 'Barang Masuk')

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
                            <li class="breadcrumb-item"><a href="{{ route('barangMasuk') }}">@yield('subtitle')</a></li>
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
                            <form action="{{ Route('barangMasuk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Nomor Invoice</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nomor_invoice" id="nomor_invoice" value="{{ $nomorInvoice }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-2 offset-8">
                                            <div class="form-group">
                                                <label>Tanggal Invoice</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="tanggal_pembelian" id="tanggal_pembelian"
                                                    value="{{ \Carbon\Carbon::now()->format('D, d-m-Y | H:i') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-sm text-uppercase"
                                                    name="vendor_id" id="vendor_id" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Vendor</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase"
                                                    name="name_vendor" id="name_vendor" value="{{ old('name_vendor') }}"
                                                    placeholder="Search Vendor..">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>PIC Name</label>
                                                <input type="text" class="form-control form-control-sm" name="pic_vendor"
                                                    id="pic_vendor" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Phone 1</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="phone_1_vendor" id="phone_1_vendor" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="phone_2_vendor" id="phone_2_vendor" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control form-control-sm text-uppercase" name="address_vendor" id="address_vendor" rows="3"
                                                    readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    name="email_vendor" id="email_vendor" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2 offset-1">
                                            <div class="form-group">
                                                <label>Mandatory Tax</label>
                                                <input type="text" name="mandatory_tax_id_vendor"
                                                    class="form-control form-control-sm" id="mandatory_tax_id_vendor"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Tax ID</label>
                                                <input type="text" name="tax_id_vendor"
                                                    class="form-control form-control-sm" id="tax_id_vendor" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-4">
                                        <h2 class="text-center mb-4">Aplikasi Kasir</h2>

                                        <div class="row">
                                            <!-- Input Barcode -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="barcode_input" class="form-label">Scan Barcode:</label>
                                                    <input type="text" id="barcode_input" class="form-control"
                                                        placeholder="Scan barcode di sini" autofocus>
                                                </div>
                                            </div>

                                            <!-- Informasi Produk -->
                                            <div class="col-md-6">
                                                <h4>Informasi Produk</h4>
                                                <div id="product_info" class="p-3 border rounded bg-light">
                                                    <p>Scan barcode untuk menampilkan produk...</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tabel Daftar Belanja -->
                                        <h4 class="mt-4">Daftar Belanja</h4>
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Harga Modal IDR</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart_items">
                                                <!-- Produk akan ditambahkan di sini -->
                                            </tbody>
                                        </table>

                                        <!-- Total Pembayaran -->
                                        <h3 class="text-end">Total: Rp <span id="total_price">0</span></h3>

                                        <!-- Tombol Checkout -->
                                        <button class="btn btn-success btn-lg w-100 mt-3"
                                            id="checkout_btn">Checkout</button>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control form-control-sm" name="user_id"
                                        id="user_id" value="{{ Auth::user()->id }}">

                                    {{-- <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                        <a href="{{ route('barangMasuk') }}" class="btn btn-danger"
                                            type="button">CANCEL</a>
                                    </div> --}}
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
        });
    </script>

    <script>
        let cart = [];

        $(document).ready(function() {
            $('#barcode_input').on('change', function() {
                let barcode = $(this).val();

                $.ajax({
                    url: '/find-product',
                    type: 'POST',
                    data: {
                        barcode: barcode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            addToCart(response.product);
                        } else {
                            alert("Produk tidak ditemukan!");
                        }
                        $('#barcode_input').val('').focus();
                    }
                });
            });

            function addToCart(product) {
                let existingProduct = cart.find(item => item.id === product.id);

                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    cart.push({
                        id: product.id,
                        name: product.name,
                        price: product.price,
                        quantity: 1
                    });
                }
                renderCart();
            }

            function renderCart() {
                let total = 0;
                $('#cart_items').html('');

                cart.forEach((item, index) => {
                    let itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    $('#cart_items').append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>Rp ${item.price}</td>
                        <td>
                            <input type="number" class="form-control qty_input" data-index="${index}" value="${item.quantity}" min="1">
                        </td>
                        <td>Rp ${itemTotal}</td>
                        <td><button class="btn btn-danger btn-sm remove_btn" data-index="${index}">Hapus</button></td>
                    </tr>
                `);
                });

                $('#total_price').text(`Rp ${total}`);

                $('.qty_input').on('change', function() {
                    let index = $(this).data('index');
                    cart[index].quantity = parseInt($(this).val());
                    renderCart();
                });

                $('.remove_btn').on('click', function() {
                    let index = $(this).data('index');
                    cart.splice(index, 1);
                    renderCart();
                });
            }

            $('#checkout_btn').on('click', function() {
                alert("Transaksi berhasil!");
                cart = [];
                renderCart();
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            let cart = [];

            // Event ketika barcode di-scan
            $('#barcode_input').on('change', function() {
                let barcode = $(this).val();
                $.ajax({
                    url: '/find-product',
                    type: 'POST',
                    data: {
                        barcode: barcode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            let product = response.product;
                            addToCart(product);
                        } else {
                            alert("Produk tidak ditemukan!");
                        }
                        $('#barcode_input').val('').focus();
                    }
                });
                console.log(product);
            });

            // Menambahkan produk ke keranjang
            function addToCart(product) {
                let existingItem = cart.find(item => item.id === barang.id);
                if (existingItem) {
                    existingItem.qty += 1;
                } else {
                    cart.push({
                        id: barang.id,
                        name: barang.nama-barang,
                        price: barang.harga_modal_idr,
                        qty: 1
                    });
                }
                updateCart();
            }

            // Mengupdate tampilan keranjang
            function updateCart() {
                let cartTable = $('#cart_items');
                cartTable.empty();
                let total = 0;

                cart.forEach((item, index) => {
                    let subtotal = item.price * item.qty;
                    total += subtotal;
                    cartTable.append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>Rp ${item.price.toLocaleString()}</td>
                        <td>
                            <input type="number" min="1" class="form-control qty-input" data-index="${index}" value="${item.quantity}">
                        </td>
                        <td>Rp ${subtotal.toLocaleString()}</td>
                        <td><button class="btn btn-danger btn-sm remove-item" data-index="${index}">Hapus</button></td>
                    </tr>
                `);
                });

                $('#total_price').text(total.toLocaleString());
            }

            // Event saat mengubah jumlah barang
            $(document).on('change', '.qty-input', function() {
                let index = $(this).data('index');
                let newQty = parseInt($(this).val());
                cart[index].quantity = newQty;
                updateCart();
            });

            // Event saat menghapus item
            $(document).on('click', '.remove-item', function() {
                let index = $(this).data('index');
                cart.splice(index, 1);
                updateCart();
            });

            // Proses checkout
            $('#checkout_button').on('click', function() {
                if (cart.length === 0) {
                    alert("Keranjang kosong!");
                    return;
                }
                $.ajax({
                    url: '/checkout',
                    type: 'POST',
                    data: {
                        cart: cart,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert("Pembayaran berhasil!");
                        cart = [];
                        updateCart();
                    }
                });
            });
        });
    </script> --}}

@endsection
@endsection
