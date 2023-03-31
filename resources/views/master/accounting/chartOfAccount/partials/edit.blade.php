@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Chart Of Account')
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
                            <li class="breadcrumb-item"><a href="{{ route('chartOfAccountHead1') }}">@yield('subtitle')</a></li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('subtitle_2')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('chartOfAccountHead1.update', $chartOfAccountHead1->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputCode">Code</label>
                                        <input type="text" class="form-control text-uppercase" name="code"
                                            id="code" value="{{ $chartOfAccountHead1->code }}" placeholder="Enter Code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDesc">Description</label>
                                        <input type="text" class="form-control text-uppercase" name="desc"
                                            id="desc" value="{{ $chartOfAccountHead1->desc }}" placeholder="Enter Description" required>
                                    </div>

                                    {{-- Hidden User --}}
                                    {{-- <input type="hidden" class="form-control" name="user_id" id="user_id"
                                        value="{{ Auth::user()->id }}" placeholder=""> --}}

                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                        <a class="btn btn-danger" href="{{ route('chartOfAccountHead1') }}"
                                            type="button">CANCEL</a>
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
