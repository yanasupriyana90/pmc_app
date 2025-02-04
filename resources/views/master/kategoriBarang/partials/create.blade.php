@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Kategori Barang')

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
                            <li class="breadcrumb-item"><a href="{{ route('kategoriBarang') }}">@yield('subtitle')</a></li>
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
                            <form action="{{ Route('KategoriBarang.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control form-control-sm text-uppercase" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
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
