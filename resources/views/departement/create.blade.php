@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<div class="card mb-1 light">
    <div class="card-header">Tambah Departement</div>
</div>
<form method="POST" action="{{ route('departement.store') }}">
    @csrf
    <div class="mb-1">
        <label class="form-label">Nama Departement</label>
        <input type="text" class="form-control @error('nama_departement')
            is-invalid
        @enderror" name="nama_departement" value="{{ old('nama_departement') }}" autofocus>
        @error('nama_departement')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1">
        <label class="form-label">Singkatan</label>
        <input type="text" class="form-control @error('singkatan')
        is-invalid
        @enderror" name="singkatan" value="{{ old('singkatan') }}" maxLength="3">
        <small>Maks 3 huruf</small>
        @error('singkatan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection