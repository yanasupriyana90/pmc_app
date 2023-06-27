@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
@section('subtitle_2', 'Selling & Buying')
@section('subtitle_3', 'REVENUE OF SALES / OCEAN FREIGHT')
@section('subtitle_4', 'SELLING RATE')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('subtitle') (@yield('subtitle_2'))</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jobSheet') }}">@yield('subtitle')</a></li>
                            <li class="breadcrumb-item active">@yield('subtitle_2')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Description 1
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Jobsheet Code</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->code_js }}</dd>
                                    <dt class="col-sm-4">Booking No.</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->booking_no))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->booking_no }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Shipper</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->shipper['name'] }}</dd>
                                    <dt class="col-sm-4">Undername MBL</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->undernameMbl))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->undernameMbl['name'] }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Undername HBL</dt>
                                    <dd class="col-sm-8">
                                        @if (empty($jobSheetHeadList->undernameHbl))
                                            <p>-</p>
                                        @else
                                            <p>{{ $jobSheetHeadList->undernameHbl['name'] }}</p>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-4">Container Type</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->containerSizeType['name'] }}</dd>
                                    <dt class="col-sm-4">Port Of Discharge</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->pod }}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Description 2
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Carrier</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->carrier }}</dd>
                                    <dt class="col-sm-4">Vessel</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->vessel }}</dd>
                                    <dt class="col-sm-4">ETD</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->etd }}</dd>
                                    <dt class="col-sm-4">Freight & Charges</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->typePayment['name'] }}</dd>
                                    <dt class="col-sm-4">Volume</dt>
                                    <dd class="col-sm-8">{{ $jobSheetHeadList->volume }}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_3')</h3>
                                <h4 class="card-text">@yield('subtitle_4')</h4>
                            </div>
                            <form action="{{ route('jobSheet.sellingBuyingStore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="container">
                                        <div class="col-sm-1" hidden>
                                            <div class="form-group">
                                                <label>Job Sheet Head ID</label>
                                                <input class="form-control" type="number" id="jobSheetHeadId"
                                                    name="jobSheetHeadId" value="{{ $jobSheetHeadList->id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-1" hidden>
                                            <div class="form-group">
                                                <label>User ID</label>
                                                <input class="form-control" type="number" id="userId" name="userId"
                                                    value="{{ $jobSheetHeadList->user_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label>Exchange Rate</label>
                                                <input class="form-control" type="number" id="exchangeRate"
                                                    name="exchangeRate">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="invoice-item-table" class="table table-bordered">
                                                        <tr>
                                                            <th width="7%">Sr No.</th>
                                                            <th width="20%">Item Name</th>
                                                            <th width="5%">Quantity</th>
                                                            <th width="5%">Price</th>
                                                            <th width="10%">Actual Amt.</th>
                                                            <th width="12.5%" colspan="2">Tax1 (%)</th>
                                                            <th width="12.5%" colspan="2">Tax2 (%)</th>
                                                            <th width="12.5%" colspan="2">Tax3 (%)</th>
                                                            <th width="12.5%" rowspan="2">Total</th>
                                                            <th width="3%" rowspan="2"></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th>Rate</th>
                                                            <th>Amt.</th>
                                                            <th>Rate</th>
                                                            <th>Amt.</th>
                                                            <th>Rate</th>
                                                            <th>Amt.</th>
                                                        </tr>
                                                        <tr>
                                                            <td><span id="sr_no">1</span></td>
                                                            <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /></td>
                                                            <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                                                            <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                                                            <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" readonly /></td>
                                                            <td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax1_rate" /></td>
                                                            <td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax1_amount" /></td>
                                                            <td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax2_rate" /></td>
                                                            <td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax2_amount" /></td>
                                                            <td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate1" data-srno="1" class="form-control input-sm number_only order_item_tax3_rate" /></td>
                                                            <td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount1" data-srno="1" readonly class="form-control input-sm order_item_tax3_amount" /></td>
                                                            <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-right">Total</td>
                                                                <td>
                                                                    <input class="form-control form-control-sm text-right"
                                                                        type="text" id="total_amt_ros" readonly>
                                                                </td>
                                                            </tr>

                                                            {{-- <tr>
                                                                <td colspan="5" class="text-right">Tax</td>
                                                                <td>
                                                                    <input class="form-control text-right"type="text"
                                                                        id="tax_1" name="tax_1" value="0"
                                                                        readonly>
                                                                </td>
                                                            </tr> --}}
                                                            {{-- <tr>
                                                                <td colspan="5" class="text-right">
                                                                    Discount %
                                                                </td>
                                                                <td>
                                                                    <input class="form-control text-right discount"
                                                                        type="text" id="discount" name="discount"
                                                                        value="10">
                                                                </td>
                                                            </tr> --}}
                                                            <tr>
                                                                <td colspan="5"
                                                                    style="text-align: right; font-weight: bold">
                                                                    Grand Total
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text"
                                                                        id="grand_total" name="grand_total"
                                                                        value="$ 0.00" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <input type="text" name="total_item_ros" id="total_item_ros"
                                                            value="1" readonly>
                                                    </table>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Other Information</label>
                                                            <textarea class="form-control" rows="3" id="other_information" name="other_information"></textarea>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="submit-section">

                                            <button class="btn btn-primary submit-btn m-r-10">Save & Send</button>
                                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('script')
    {{-- add multiple row --}}
    {{-- <script>
        var rowIdx = 1;
        $("#addBtn").on("click", function() {
            // Adding a row inside the tbody.
            $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="categoryRos" name="categoryRos[]"></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="remarksRos" name="remarksRos[]"></td>
                    <td><input class="form-control unit_price" style="width:100px" type="text" id="unitCostRos" name="unit_cost[]"></td>
                    <td><input class="form-control qty" style="width:80px" type="text" id="qtyRos" name="qty[]" value="{{ $jobSheetHeadList->volume }}"></td>
                    <td><input class="form-control total" style="width:120px" type="text" id="amountRos" name="amount[]" value="0" readonly></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-alt"></i></a></td>
                </tr>`);
        });
        $("#tableEstimate tbody").on("click", ".remove", function() {
            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest("tr").nextAll();
            // Iterating across all the rows
            // obtained to change the index
            child.each(function() {
                // Getting <tr> id.
                var id = $(this).attr("id");

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children(".row-index").children("p");

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`${dig - 1}`);

                // Modifying row id.
                $(this).attr("id", `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest("tr").remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
        });

        $("#unitCostRos").keyup(function(){
            var nilaiUnitCostRos = parseFloat($("#unitCostRos").val());
            var nilaiQtyRos = parseFloat($("#qtyRos").val());
            var hasilAmountRos = parseFloat(nilaiUnitCostRos) * parseFloat(nilaiQtyRos);
            if(!isNaN(hasilAmountRos))
            {
                $("#amountRos").val(hasilAmountRos);
            } else {
                $("#amountRos").val(0);
            }
        });
        $("#qtyRos").keyup(function(){
            var nilaiQtyRos = parseFloat($("#qtyRos").val());
            var nilaiUnitCostRos = parseFloat($("#unitCostRos").val());
            var hasilAmountRos = parseFloat(nilaiQtyRos) * parseFloat(nilaiUnitCostRos);
            if(!isNaN(hasilAmountRos))
            {
                $("#amountRos").val(hasilAmountRos);
            } else {
                $("#amountRos").val(0);
            }
        });


        // $("#tableEstimate tbody").on("input", ".unit_price", function() {
        //     var unit_price = parseFloat($(this).val());
        //     var qty = parseFloat($(this).closest("tr").find(".qty").val());
        //     var total = $(this).closest("tr").find(".total");
        //     total.val(unit_price * qty);

        //     calc_total();
        // });

        // $("#tableEstimate tbody").on("input", ".qty", function() {
        //     var qty = parseFloat($(this).val());
        //     var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
        //     var total = $(this).closest("tr").find(".total");
        //     total.val(unit_price * qty);
        //     calc_total();
        // });

        // function calc_total() {
        //     var sum = 0;
        //     $(".total").each(function() {
        //         sum += parseFloat($(this).val());
        //     });
        //     $(".subtotal").text(sum);

        //     var amounts = sum;
        //     var tax = 100;
        //     $(document).on("change keyup blur", "#qty", function() {
        //         var qty = $("#qty").val();
        //         var discount = $(".discount").val();
        //         $(".total").val(amounts * qty);
        //         $("#sum_total").val(amounts * qty);
        //         $("#tax_1").val((amounts * qty) / tax);
        //         $("#grand_total").val((parseInt(amounts)) - (parseInt(discount)));
        //     });
        // }
    </script> --}}

    <script>
        $(document).ready(function() {
            var total_amt_ros = $('#total_amt_ros').text();
            var count = 1;

            $(document).on('click', '#add_row', function() {
                count++;
                $('#total_item_ros').val(count);
                var html_code = '';
                html_code += '<tr id="row_id_' + count + '">';

                html_code += '<td id="itemRos_no">' + count + '</td>';
                html_code +=
                    '<td><input class="form-control form-control-sm input-sm" style="min-width:150px" type="text" id="itemRos' +
                    count + '" name="itemRos[]"></td>';
                html_code +=
                    '<td><input class="form-control form-control-sm input-sm number_only" style="width:80px" type="text" id="volRos' +
                    count + '" data-categoryRosNo="' + count +
                    '" name="volRos[]" value="{{ $jobSheetHeadList->volume }}" readonly></td>';
                html_code +=
                    '<td><input class="form-control form-control-sm input-sm number_only" style="width:100px" type="text" id="priceRos' +
                    count + '" data-categoryRosNo="' + count + '" name="priceRos[]"></td>';
                html_code +=
                    '<td><input class="form-control form-control-sm input-sm" style="width:120px" type="text" id="amountRos' +
                    count + '" data-categoryRosNo="' + count + '" name="amountRos[]" readonly></td>';
                html_code +=
                    '<td><input class="form-control form-control-sm input-sm" style="min-width:150px" type="text" id="remarksRos' +
                    count + '" data-categoryRosNo="' + count + '" name="remarksRos[]"></td>';

                html_code += '<td><button type="button" name="remove_row" id="' + count +
                    '" class="btn btn-danger btn-xs remove_row"><i class="fa fa-trash-alt"></i></a></button></td>';
                html_code += '</tr>';
                $('#tableRos').append(html_code);
            });

            // $(document).on('click', '.remove_row', function() {
            //     var row_id = $(this).attr("id");
            //     var total_item_amount = $('#order_item_final_amount' + row_id).val();
            //     var final_amount = $('#final_total_amt').text();
            //     var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
            //     $('#final_total_amt').text(result_amount);
            //     $('#row_id_' + row_id).remove();
            //     count--;
            //     $('#total_item').val(count);
            // });
            $(document).on('click', '.remove_row', function() {
                var row_id = $(this).attr("id");
                var total_item_amount_ros = $('#amountRos' + row_id).val();
                var total_amount_ros = $('#total_amt_ros').text();
                var result_amount_ros = parseFloat(total_amount_ros) - parseFloat(total_item_amount_ros);
                $('#total_amt_ros').text(result_amount_ros);
                $('#row_id_' + row_id).remove();
                count--;
                $('#total_item_ros').val(count);
            });

            function cal_total_ros(count) {
                var item_total_ros = 0;
                for (j = 1; j <= count; j++) {
                    var volRos = 0;
                    var priceRos = 0;
                    var total_amount = 0;
                    var item_total = 0;
                    volRos = $('#volRos' + j).val();
                    if (volRos > 0) {
                        price = $('#priceRos' + j).val();
                        if (priceRos > 0) {
                            total_amount = parseFloat(volRos) * parseFloat(priceRos);
                            $('#amountRos' + j).val(total_amount);
                            // tax1_rate = $('#order_item_tax1_rate' + j).val();
                            item_total = parseFloat(total_amount)
                            item_total_ros = parseFloat(item_total_ros) + parseFloat(item_total);
                            $('#amountRos' + j).val(item_total);
                        }
                    }
                }
                $('#total_amt_ros').text(item_total_ros);
            }

            $(document).on('blur', '.priceRos', function() {
                cal_total_ros(count);
            });

            // $(document).on('blur', '.order_item_tax1_rate', function() {
            //     cal_final_total(count);
            // });

            // $(document).on('blur', '.order_item_tax2_rate', function() {
            //     cal_final_total(count);
            // });

            // $(document).on('blur', '.order_item_tax3_rate', function() {
            //     cal_final_total(count);
            // });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.number_only').keypress(function(e) {
                return isNumbers(e, this);
            });

            function isNumbers(evt, element) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (
                    (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                    (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        });
    </script>
@endsection

@endsection
