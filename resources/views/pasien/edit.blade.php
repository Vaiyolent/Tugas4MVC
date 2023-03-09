@extends('layout.bootstraps')

@section('isi')

<nav class="navbar bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand">Edit Data</a>
    </div>
</nav>
<div class="container">
    <div class="flex">
        <form action='{{ url('pasien/'.$payload->id) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="{{url('pasien')}}" class="btn btn-primary mb-3">Back</a>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' id="nama" value="{{ $payload->nama }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="usia" class="col-sm-2 col-form-label">Usia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='usia' id="usia" value="{{ $payload->usia }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tinggiBadan" class="col-sm-2 col-form-label">Tinggi Badan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tinggiBadan' id="tinggiBadan" value="{{ $payload->tinggiBadan }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="beratBadan" class="col-sm-2 col-form-label">Berat Badan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='beratBadan' id="beratBadan" value="{{ $payload->beratBadan }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="beratBadan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 d-md-flex justify-content-md-end"><button type="submit" class="btn btn-success" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection