@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-1">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Daftar Departement
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    <!-- Main page content-->
    <div class="container-xl px-4 mt-2">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('departement.create') }}" class="btn btn-primary">Tambah Departement</a>
                <div class="card card-header-actions mb-1 mt-1">
                    <div class="card-header">
                        List Departement
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-striped table-hover table-sm" id="crudTable">
                            <thead>
                                <tr>
                                    <th width="10">Nomor</th>
                                    <th>Nama Departemen</th>
                                    <th>Singkatan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($departements as $index=>$item)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td><a href="{{ route('departement.show',$item->id) }}" style="color: black;">
                                        {{ $item->nama_departement }}
                                    </a></td>
                                    <td>{{ $item->singkatan }}</td>
                                    <td><a href="{{ route('departement.edit',$item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                        <form
                                        action="{{ route('departement.destroy',$item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form></td>
                                </tr>
                                    
                                @empty
                                    <p>Data Belum Ada</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $departements->render() }}
                    </div>
                </div>
            </div>
        </div>           
    </div>
</main>
@endsection