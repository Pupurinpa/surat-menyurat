@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<div class="card mb-1 light">
    <div class="card-header">Ubah Jenis Surat</div>
</div>
<form method="POST" action="{{ route('tipe.update',$tipes->id) }}">
    @csrf
    {{ method_field('PUT') }}
    <div class="mb-1">
        <label class="form-label">Nama Departement</label>
        <input type="text" class="form-control @error('tipe')
            is-invalid
        @enderror" name="tipe" value="{{ old('tipe',$tipes->tipe) }}" 
       
        autofocus>
        @error('tipe')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1">
        <label class="form-label">Kode</label>
        <input type="text" class="form-control @error('kode')
        is-invalid
        @enderror" name="kode" value="{{ old('kode',$tipes->kode) }}" 
        maxLength="3">
        <small>Maks 3 huruf</small>
        @error('kode')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection