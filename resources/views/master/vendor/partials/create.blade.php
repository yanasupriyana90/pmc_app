@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Vendor')

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
                            <li class="breadcrumb-item"><a href="{{ route('vendor') }}">@yield('subtitle')</a></li>
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
                            <form action="{{ Route('vendor.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputInitialCode">Initial Code</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase" name="initial_code" id="initial_code" value="{{ old('initial_code') }}" placeholder="Enter Initial Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control form-control-sm text-uppercase" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Addres</label>
                                        <textarea class="form-control form-control-sm text-uppercase" name="address" id="address" placeholder="Enter Address">{{ old('address') }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPicName">PIC Name</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase" name="pic_name" id="pic_name" value="{{ old('pic_name') }}" placeholder="Enter PIC Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_1">Phone 1</label>
                                                <input type="text" class="form-control form-control-sm" name="phone_1" id="phone_1" value="{{ old('phone_1') }}" placeholder="ENTER PHONE 1">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputPhone_2">Phone 2</label>
                                                <input type="text" class="form-control form-control-sm" name="phone_2" id="phone_2" value="{{ old('phone_2') }}" placeholder="ENTER PHONE 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="inputEmail">Email Address</label>
                                                <input type="email" class="form-control form-control-sm text-lowercase" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email Address">
                                            </div>
                                        </div>
                                        <div class="col-2 ml-5">
                                            <div class="form-group">
                                                <label for="mandatory_tax">Mandatory Tax</label>
                                                <select name="mandatory_tax_id" id="mandatory_tax_id" class="form-control form-control-sm select2"
                                                    style="width: 100%;" onchange="showDiv(this)">
                                                    @foreach ($vendor as $item)
                                                        <option value="{{ old('mandatory_tax_id', $item->id) }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row" id="tax_id_group" style="display: none;">
                                                <label for="inputTaxId">Tax ID</label>
                                                <input type="text" class="form-control form-control-sm" name="tax_id" id="tax_id"
                                                value="{{ old('tax_id') }}" placeholder="Enter Tax ID">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden User --}}
                                    <input type="hidden" class="form-control form-control-sm" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary mr-3" type="submit">SAVE</button>
                                        <a href="{{ route('vendor') }}" class="btn btn-danger" type="button">CANCEL</a>
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
        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    }

    document.onkeypress = stopRKey;

    </script>
