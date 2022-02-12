@extends('layouts.app')
@section('content')
<form>
    <div class="mt-1">
        <Label class="form-label">Nama Departement :</Label>
        <input type="text" class="form-control" value="{{$departements->nama_departement}}" disabled>
    </div>
    <div class="mt-1">
        <Label class="form-label">Singkatan :</Label>
        <input class="form-control" value="{{ $departements->singkatan }}" disabled>
    </div>
    <div class="mt-1">
        <Label class="form-label">Dibuat Pada :</Label>
        <input class="form-control" value="{{date('d M Y',strtotime($departements->created_at)) }}" disabled>
    </div>
    
</form>

@endsection