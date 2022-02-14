@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<div class="container-xl px-4 mt-2">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-header-actions mb-1 mt-1">
                <div class="card-header">
                    List Surat
                </div>
                <div class="card-body">
                    
                    <table class="table table-striped table-hover table-sm" id="suratTable">
                        <thead>
                            <tr>
                                <th width="10">Nomor</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal</th>
                                <th>Perihal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($surats as $index=>$item)
                            <tr><a href="">
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $item->nomor_surat }}
                                </td>
                                <td>{{ $item->tanggal_surat }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td><a href="#" class="btn btn-warning btn-sm">Ubah</a>
                                    <form
                                    action="#"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form></td>
                                </a>
                            </tr>
                                
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
@endsection