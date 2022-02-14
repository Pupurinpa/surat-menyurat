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
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Tambah Surat
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header">Form Surat</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="tipe_kode" class="col-sm-3 col-form-label">Jenis Surat</label>
                                <div class="col-sm-9">
                                    <select name="tipe_kode" class="form-control" required>
                                        <option value="">Pilih..</option>
                                        @forelse ($tipes as $item)
                                            <option value="{{ $item->kode }}" 
                                                {{ (old('tipe_kode') == $item->kode)? 'selected':''; }}
                                                >{{ $item->tipe }}</option>
                                        @empty
                                            <option value="empty">data tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                                @error('kode')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">No. Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nomor_surat')
                                    is-invalid
                                    @enderror" name="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Nomor Surat..">
                                    @error('nomor_surat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_date" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('tanggal_surat')
                                        is-invalid
                                    @enderror
                                    "  name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                                    @error('tanggal_surat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="regarding" class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('perihal')
                                        is-invalid
                                    @enderror" name="perihal" value="{{ old('perihal') }}" placeholder="Perihal.." required>
                                    @error('perihal')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="singkatan" class="col-sm-3 col-form-label">Departemen</label>
                                <div class="col-sm-9">
                                    <select name="singkatan" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        @forelse ($departements as $data)
                                            <option value="{{ $data->singkatan }}" 
                                            {{ (old('departement_singkatan') == $data->singkatan)? 'selected':''; }}
                                            >{{ $data->nama_departement }}</option>
                                        @empty
                                        <option value="empty">data tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                                @error('singkatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('letter_file')
                                        is-invalid
                                    @enderror 
                                    " value="{{ old('letter_file') }}" name="letter_file" accept="application/pdf" required>
                                    <div id="letter_file" class="form-text">Ekstensi .pdf</div>
                                    @error('letter_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection