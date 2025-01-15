@extends('admin.panel')

@section('title', 'Master')

@section('subtitle', 'Vendor')

@section('subtitle_2', 'Edit Data')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('subtitle')</h1>
                    </div>
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
                            <form action="{{ route('vendor.update', $vendor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Initial Code</label>
                                                <input type="text" class="form-control form-control-sm text-uppercase"
                                                    name="initial_code" id="initial_code"
                                                    value="{{ $vendor->initial_code }}" placeholder="Enter Initial Code"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            id="name" value="{{ old('name', $vendor->name) }}"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control form-control-sm text-uppercase" name="address" id="address" placeholder="Enter Address">{{ old('address', $vendor->address) }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phone 1</label>
                                                <input type="text" class="form-control form-control-sm" name="phone_1"
                                                    id="phone_1" value="{{ old('phone_1', $vendor->phone_1) }}"
                                                    placeholder="Enter Phone 1">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <input type="text" class="form-control form-control-sm" name="'phone_2"
                                                    id="phone_2" value="{{ old('phone_2', $vendor->phone_2) }}"
                                                    placeholder="Enter Phone 2">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" class="form-control form-control-sm" name="fax"
                                                    id="fax" value="{{ old('fax', $vendor->fax) }}"
                                                    placeholder="Enter Fax">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control form-control-sm" name="email"
                                                    id="email" value="{{ old('email', $vendor->email) }}"
                                                    placeholder="Enter Email Address">
                                            </div>
                                        </div>
                                        <div class="col-2 ml-5">
                                            <div class="form-group">
                                                <label>Mandatory Tax</label>
                                                <select class="form-control form-control-sm select2" name="mandatory_tax_id" id="mandatory_tax_id"
                                                    style="width: 100%;" onchange="showDiv(this)">
                                                    <option value="{{ old('mandatory_tax_id', $vendor->mandatoryTax->id) }}">{{ $vendor->mandatoryTax->name }}</option>
                                                    @foreach ($mandatoryTax as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group row" id="tax_id_group">
                                                <label for="inputTaxId">Tax ID</label>
                                                <input type="text" class="form-control form-control-sm" name="tax_id" id="tax_id"
                                                    value="{{ old('tax_id', $vendor->tax_id) }}" placeholder="Enter TAX ID">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Hidden User --}}
                                    <input type="hidden" name="user_id" id="user_id" class="form-control form-control-sm" value="{{ Auth::user()->id }}">

                                    <div class="d-grip gap-2 d-md-block">
                                        <button class="btn btn-primary mr-3" type="submit">UPDATE</button>
                                        <a href="{{ route('vendor') }}" class="btn btn-danger" type="button">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    function showDiv(select) {
        // console.log(select.options[select.selectedIndex].text);
        if (select.options[select.selectedIndex].text != "NONE TAX") {
            document.getElementById('tax_id_group').style.display = "block";
        } else {
            document.getElementById('tax_id_group').style.display = "none";
            document.getElementById('tax_id').value = "";
        }
    }
</script>
