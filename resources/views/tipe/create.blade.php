@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<div class="card mb-3 light">
    <div class="card-header">Tambah Jenis Surat</div>
</div>
<form method="POST" action="{{ route('tipe.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Jenis Surat</label>
        <input type="text" class="form-control @error('tipe')
            is-invalid
        @enderror" name="tipe" value="{{ old('tipe') }}" autofocus>
        @error('tipe')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Kode</label>
        <input type="text" class="form-control @error('kode')
        is-invalid
        @enderror" name="kode"  value="{{ old('kode') }}" maxlength="2" onkeypress="return hanyaAngka(event)">
        <small>Maks 2 hanya angka</small>
        @error('kode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
@endsection