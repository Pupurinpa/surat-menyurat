@extends('layouts.app')
@section('content')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Daftar Departement
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <a href="{{ route('departement.create') }}" class="btn btn-primary">Tambah Departement</a>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header-actions mb-4">
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
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $item->nama_departement }}</td>
                                    <td>{{ $item->singkatan }}</td>
                                    <td><a href="#" class="btn btn-warning">Ubah</a><br>
                                        <a href="#" class="btn btn-danger">Hapus</a></td>
                                    
                                @empty
                                    <p>Data Belum Ada</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>           
    </div>
</main>
@endsection