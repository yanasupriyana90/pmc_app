@extends('admin.panel')

@section('title', 'Marketing')

@section('subtitle', 'Job Sheet')
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputCodeCurrency">Code Currency</label>
                                                <input type="text" name="code_currency" class="form-control"
                                                    id="code_currency" value="{{ $typeCurrency->code_currency }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $typeCurrency->name }}" disabled>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('typeCurrency') }}" class="btn btn-success" type="button">OK</a>
                                        <a class="btn btn-primary" href="{{ route('typeCurrency.edit', $typeCurrency->id) }}"><i
                                                class="fa fa-edit"></i> Edit</a>
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
    function showDivCons(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id_cons').value = "";
            document.getElementById('tax_id_group_cons').style.display = "block";
        } else {
            document.getElementById('tax_id_group_cons').style.display = "none";
        }
    }

    function showDivNotify(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id_notify').value = "";
            document.getElementById('tax_id_group_notify').style.display = "block";
        } else {
            document.getElementById('tax_id_group_notify').style.display = "none";
        }
    }

    function showDivNotifyAll() {
        if (document.getElementById('checkBoxNotify').checked) {
            document.getElementById('notify_party_group').style.display = 'none';
        } else {
            document.getElementById('notify_party_group').style.display = 'block';
        }
    }

    function showDivUndHblAll() {
        if (document.getElementById('checkBoxUndHbl').checked) {
            document.getElementById('und_hbl_group').style.display = 'block';
        } else {
            document.getElementById('und_hbl_group').style.display = 'none';
        }
    }

    function showDivCommodityHblAll() {
        if (document.getElementById('checkBoxCommodityHbl').checked) {
            document.getElementById('commodity_hbl_group').style.display = 'block';
        } else {
            document.getElementById('commodity_hbl_group').style.display = 'none';
        }
    }
</script>
