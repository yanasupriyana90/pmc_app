@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')

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

        <!-- Main content -->

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary pull-right" href="{{ Route('jobSheet.create') }}" role="button"><i
                        class="fa fa-plus"></i> Add Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Job Sheet</th>
                            <th>Booking No</th>
                            <th>Shipper</th>
                            {{-- <th>Undername M-BL</th>
                            <th>Undername H-BL</th>
                            <th>Consignee</th>
                            <th>Address Cons</th>
                            <th>Phone 1 Cons</th>
                            <th>Phone 2 Cons</th>
                            <th>Fax Cons</th>
                            <th>Email Cons</th>
                            <th>Mandatory Tax Cons</th>
                            <th>Tax ID Cons</th>
                            <th>Same As Cons</th>
                            <th>Notify Party</th>
                            <th>Address Notify</th>
                            <th>Phone 1 Notify</th>
                            <th>Phone 2 Notify</th>
                            <th>Fax Notify</th>
                            <th>Email Notify</th>
                            <th>Mandatory Tax Notify</th>
                            <th>Tax ID Notify</th>
                            <th>Carrier</th>
                            <th>Vessel</th>
                            <th>ETD</th>
                            <th>P.O.L</th>
                            <th>P.O.D</th>
                            <th>Open CY</th>
                            <th>Closing Doc</th>
                            <th>Closing CY</th>
                            <th>Volume</th>
                            <th>Size/ Type Cont</th>
                            <th>Qty</th>
                            <th>Type Pack</th>
                            <th>Gross Weight</th>
                            <th>Type Gross Weight</th>
                            <th>Net Weight</th>
                            <th>Type Net Weight</th>
                            <th>Measurement</th>
                            <th>Type Measurement</th>
                            <th>Commodity M-B/L</th>
                            <th>HS Code</th>
                            <th>Type M-B/L</th>
                            <th>Commodity H-B/L</th>
                            <th>HS Code</th>
                            <th>Type H-B/L</th>
                            <th>Stuffing Date</th>
                            <th>Stuffing Address</th>
                            <th>PIC Name</th>
                            <th>PIC Phone</th>
                            <th>T.O.P</th>
                            <th>Type Payment</th>
                            <th>Remaks</th> --}}
                            <th>SI Doc</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Status Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobSheetHeadList as $jobSheetHead)
                            <tr>
                                <td class="align-middle" style="text-align:center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $jobSheetHead->code_js }}</td>
                                <td class="align-middle">{{ $jobSheetHead->booking_no }}</td>
                                <td class="align-middle">{{ $jobSheetHead->shipper['name'] }}</td>
                                {{-- <td class="align-middle">{{ $jobSheetHead->undernameMbl['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->undernameHbl['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->name_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->address_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->phone_1_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->phone_2_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->fax_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->email_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->mandatoryTaxCons['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->tax_id_cons }}</td>
                                <td class="align-middle">{{ $jobSheetHead->same_as_consignee }}</td>
                                <td class="align-middle">{{ $jobSheetHead->name_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->address_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->phone_1_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->phone_2_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->fax_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->email_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->mandatoryTaxNotify['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->tax_id_notify }}</td>
                                <td class="align-middle">{{ $jobSheetHead->carrier }}</td>
                                <td class="align-middle">{{ $jobSheetHead->vessel }}</td>
                                <td class="align-middle">{{ $jobSheetHead->etd }}</td>
                                <td class="align-middle">{{ $jobSheetHead->pol }}</td>
                                <td class="align-middle">{{ $jobSheetHead->pod }}</td>
                                <td class="align-middle">{{ $jobSheetHead->open_cy }}</td>
                                <td class="align-middle">{{ $jobSheetHead->closing_doc }}</td>
                                <td class="align-middle">{{ $jobSheetHead->closing_cy }}</td>
                                <td class="align-middle">{{ $jobSheetHead->volume }}</td>
                                <td class="align-middle">{{ $jobSheetHead->containerSizeType['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->qty }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typePack['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->gross_weight }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typeWeightGross['code_weight'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->net_weight }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typeWeightNet['code_weight'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->measurement }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typeMeasurement['code_measurement'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->commodity_mbl }}</td>
                                <td class="align-middle">{{ $jobSheetHead->hs_code_mbl }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typeBillOfLadingMbl['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->commodity_hbl }}</td>
                                <td class="align-middle">{{ $jobSheetHead->hs_code_hbl }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typeBillOfLadingHbl['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->stuffing_date }}</td>
                                <td class="align-middle">{{ $jobSheetHead->stuffing_address }}</td>
                                <td class="align-middle">{{ $jobSheetHead->pic_name }}</td>
                                <td class="align-middle">{{ $jobSheetHead->pic_phone }}</td>
                                <td class="align-middle">{{ $jobSheetHead->top }}</td>
                                <td class="align-middle">{{ $jobSheetHead->typePayment['name'] }}</td>
                                <td class="align-middle">{{ $jobSheetHead->remarks }}</td> --}}
                                <td class="align-middle">
                                    <a href="{{ asset('si_doc/' . $jobSheetHead->si_doc) }}" target="_blank"
                                        rel="nooperner noreferrer">{{ $jobSheetHead->si_doc }}</a>
                                </td>
                                <td class="align-middle" style="text-align:center">
                                    @if ($jobSheetHead->status == 0)
                                    <a class="text-warning">PENDING</a>
                                    @elseif ($jobSheetHead->status == 1)
                                    <a class="text-success">APPROVED</a>
                                    @else
                                    <a class="text-danger">REJECTED</a>
                                    @endif
                                </td>
                                <td class="align-middle" style="text-align:center">{{ $jobSheetHead->user['name'] }}</td>
                                <td class="align-middle" style="text-align:center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('jobSheet.show', $jobSheetHead->id) }}"><i class="fa fa-eye"></i> Show Detail</a>
                                    <a class="btn btn-primary btn-xs" href="{{ route('jobSheet.sellingBuyingCreate',  $jobSheetHead->id) }}"><i class="fa fa-exchange-alt"></i> Selling & Buying</a>
                                    <a class="btn btn-danger btn-xs" href="#" id="delete"><i
                                            class="fa fa-trash"></i> Delete</a>
                                </td>
                                <td class="align-middle" style="text-align:center">
                                    @if ($jobSheetHead->status == 0)
                                    <a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}" class="btn btn-xs btn-warning" id="changeStatus">PENDING</a>
                                    {{-- <a href="{{ Route('jobSheet.changeStatus') }}" class="btn btn-xs btn-warning">PENDING</a> --}}
                                    @elseif ($jobSheetHead->status == 1)
                                    <a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}" class="btn btn-xs btn-success" id="changeStatus">APPROVED</a>
                                    @else
                                    <a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}" class="btn btn-xs btn-danger" id="changeStatus">REJECTED</a>
                                    @endif
                                    {{-- <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle"
                                                data-toggle="dropdown">
                                                @if ($jobSheetHead->status == 0)
                                                <label>PENDING</label>
                                                @elseif ($jobSheetHead->status == 1)
                                                <label>APPROVED</label>
                                                @else
                                                <label>REJECTED</label>
                                                @endif
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}">PENDING</a></li>
                                                <li class="dropdown-item"><a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}">APPROVED</a></li>
                                                <li class="dropdown-item"><a href="{{ url('jobSheetStatus/'.$jobSheetHead->id) }}">REJECTED</a></li>
                                            </ul>
                                    </div> --}}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
