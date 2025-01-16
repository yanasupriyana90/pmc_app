<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title') | @yield('subtitle') | @yield('subtitle_2')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/jquery-ui/jquery-ui.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Notification -->
    <link rel="stylesheet" href="{{ asset('lte') }}/plugins/toastr/toastr.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('lte') }}/dist/img/LogoBulat.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        @include('admin.header')

        @include('admin.sidebar')

        @yield('content')

        @include('admin.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('lte') }}/plugins/jquery/jquery.js"></script>
    {{-- <script src="{{ asset('lte') }}/plugins/jquery/simple.money.format.js"></script> --}}
    {{-- <script src="{{ asset('lte') }}/plugins/jquery/style.js"></script> --}}
    {{-- <script src="{{ asset('resources') }}/js/style.js"></script> --}}

    {{-- <script src="{{ asset('lte') }}/plugins/jquery/jquery.min.js"></script> --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- app.js -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('resources') }}/js/rupiah-input.js"></script> --}}

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte') }}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('lte') }}/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
    {{-- <script src="{{ asset('lte') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/moment/moment.min.js"></script>

    <!-- InputMask -->
        <!-- Robin Herbots -->
        <script src="{{ asset('lte') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- Igor Escobar -->
        {{-- <script src="{{ asset('lte') }}/plugins/inputmask/jquery.mask.js"></script> --}}

    <!-- daterangepicker -->
    <script src="{{ asset('lte') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte') }}/dist/js/adminlte.js"></script>
    {{-- <script src="{{ asset('lte') }}/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('lte') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte') }}/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('lte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    @yield('scriptCreateSellingBuying')
    @yield('scriptCreateJobsheet')
    @yield('scriptIndexJobsheet')
    @yield('scriptShowDetailJobsheet')
    @yield('scriptContSealDetail')
    @yield('scriptCreateBarang')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>

    <script src="{{ asset('lte') }}/plugins/toastr/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <script src="{{ asset('lte') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('lte') }}/plugins/code.js"></script>
    {{-- <script src="{{ asset('lte') }}/plugins/casInBank.js"></script> --}}
    {{-- <script src="{{ asset('lte') }}/plugins/multiJobsheet.js"></script> --}}

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileNameTrDoc = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileNameTrDoc);
        });
    </script>

    {{-- <script>
        $(document).ready(function () {
            let baris = 1

            $(document).on('click', '#tambah_cont_seal_detail', function () {
                baris = baris + 1
                var html = "<tr id= 'baris'" +baris+ ">"
                    html += "<td>"+baris+"</td>"
                    html += "<td contenteditable='true' class='cont_seal' ></td>"
                    html += "<td contenteditable='true' class='qty' ></td>"
                    // html += "<td contenteditable='true' class='type_pack' ></td>"
                    html += "<td contenteditable='true' class='net_weight' ></td>"
                    html += "<td contenteditable='true' class='net_type_weight' ></td>"
                    html += "<td contenteditable='true' class='gross_weight' ></td>"
                    html += "<td contenteditable='true' class='gross_type_weight' ></td>"
                    html += "<td contenteditable='true' class='measurement' ></td>"
                    html += "<td contenteditable='true' class='type_measurement' ></td>"
                    // html += "<td contenteditable='true' class='job_sheet_head_id' ></td>"
                    html += "<td><button class='btn-sm btn-danger' data-row='baris'"+baris+" id='hapus_cont_seal_detail' >Remove</button></td>"
                    html += "</tr"

                    $('#tbl_cont_seal_detail').append(html)
            })
        })

        $(document).on('click', '#hapus_cont_seal_detail', function () {
            let hapus = $(this).data('row')
            $('#' + hapus).remove()
        })

        $(document).on('click', '#simpan_cont_seal_detail', function () {
            let cont_seal = []
            let qty = []
            // let type_pack = []
            let net_weight = []
            let net_type_weight = []
            let gross_weight = []
            let gross_type_weight = []
            let measurement = []
            let type_measurement = []
            // let job_sheet_head_id = []

            $('cont_seal').each(function() {
                cont_seal.push($(this).text())
            })
            $('qty').each(function() {
                qty.push($(this).text())
            })
            // $('type_pack').each(function() {
            //     type_pack.push($(this).text())
            // })
            $('net_weight').each(function() {
                net_weight.push($(this).text())
            })
            $('net_type_weight').each(function() {
                net_type.push($(this).text())
            })
            $('gross_weight').each(function() {
                gross_weight.push($(this).text())
            })
            $('gross_type_weight').each(function() {
                gross_type.push($(this).text())
            })
            $('measurement').each(function() {
                measurement.push($(this).text())
            })
            $('type_measurement').each(function() {
                measurement_type.push($(this).text())
            })
            // $('job_sheet_head_id').each(function() {
            //     job_sheet_head_id.push($(this).text())
            // })

            $.ajax({
                url : "{{ route('simpan_cont_seal') }}",
                type : "post",
                data : {
                    cont_seal : cont_seal,
                    qty : qty,
                    // type_pack : type_pack,
                    net_weight : net_weight,
                    net_type_weight : net_type_weight,
                    gross_weight : gross_weight,
                    gross_type_weight : gross_type_weight,
                    measurement : measurement,
                    type_measurement : type_measurement,
                    // job_sheet_head_id : job_sheet_head_id,
                    "_token" : "{{ csrf_token() }}"
                },success : function (res) {
                    console.log(res);
                },error : function (xhr) {
                    console.error(xhr);
                }
            })
        })
    </script> --}}

</body>

</html>
