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
                            Daftar Surat
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
                <input type="text" class="form-control" id="cariSurat" onkeyup="myFunction()" placeholder="Cari Nomor Surat.." title="Type in a Nomor Surat">
                <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">Tambah Surat</a>
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
                                    <td><a href="{{ route('surat.show',$item->id) }}" class="btn btn-primary btn-sm">detail</a>
                                        <form
                                        action="{{ route('surat.destroy',$item->id) }}"
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
</main>
<script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("cariSurat");
      filter = input.value.toUpperCase();
      table = document.getElementById("suratTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>
@endsection