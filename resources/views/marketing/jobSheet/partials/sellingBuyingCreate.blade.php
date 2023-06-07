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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_3')</h3>
                                <h4 class="card-text">@yield('subtitle_4')</h4>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="container">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label>Kurs</label>
                                                <input class="form-control" type="email" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-white" id="tableRevOfSaleOceanFreight">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 20px">#</th>
                                                                {{-- <th class="col-sm-2">Item</th> --}}
                                                                <th class="col-md-6">Category</th>
                                                                <th style="width:80px;">Qty</th>
                                                                <th style="width:100px;">Unit Cost</th>
                                                                <th>Amount</th>
                                                                <th> </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            {{-- <td><input class="form-control" style="min-width:150px" type="text" id="item" name="item[]"></td> --}}
                                                            <td><input class="form-control"style="min-width:150px" type="text" id="description" name="description[]"></td>
                                                            <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                                                            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
                                                            <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                                                            <td><a href="javascript:void(0)" class="text-success font-18" title="Add" id="addBtn"><i class="fa fa-plus"></i></a></td>
                                                        </tr>
                                                        </tbody>
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
                                                                <td class="text-right">Total Revenue</td>
                                                                <td>
                                                                    <input class="form-control text-right total" type="text" id="sum_total" name="total" value="0" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" class="text-right">Tax</td>
                                                                <td>
                                                                    <input class="form-control text-right"type="text" id="tax_1" name="tax_1" value="0" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" style="text-align: right; font-weight: bold">
                                                                    Grand Total
                                                                </td>
                                                                <td style="font-size: 16px;width: 230px">
                                                                    <input class="form-control text-right" type="text" id="grand_total" name="grand_total" value="$ 0.00" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
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
        <script>
            var rowIdx = 1;
            $("#addBtn").on("click", function ()
            {
                // Adding a row inside the tbody.
                $("#tableRevOfSaleOceanFreight tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
                    <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
                    <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
                    <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a></td>
                </tr>`);
            });
            $("#tableRevOfSaleOceanFreight tbody").on("click", ".remove", function ()
            {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function () {
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

            $("#tableRevOfSaleOceanFreight tbody").on("input", ".unit_price", function () {
                var unit_price = parseFloat($(this).val());
                var qty = parseFloat($(this).closest("tr").find(".qty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);

                calc_total();
            });

            $("#tableRevOfSaleOceanFreight tbody").on("input", ".qty", function () {
                var qty = parseFloat($(this).val());
                var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);
                calc_total();
            });
            function calc_total() {
                var sum = 0;
                $(".total").each(function () {
                sum += parseFloat($(this).val());
                });
                $(".subtotal").text(sum);

                var amounts = sum;
                var tax     = 100;
                $(document).on("change keyup blur", "#qty", function()
                {
                    var qty = $("#qty").val();
                    var discount = $(".discount").val();
                    $(".total").val(amounts * qty);
                    $("#sum_total").val(amounts * qty);
                    $("#tax_1").val((amounts * qty)/tax);
                    $("#grand_total").val((parseInt(amounts)) - (parseInt(discount)));
                });
            }

        </script>
    @endsection
@endsection
