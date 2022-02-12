@extends('layouts.app')
@section('content')
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
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header">Form Surat</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="letter_type" class="col-sm-3 col-form-label">Jenis Surat</label>
                                <div class="col-sm-9">
                                    <select name="letter_type" class="form-control" required>
                                        <option value="">Pilih..</option>
                                        @forelse ($tipes as $item)
                                            <option value="{{ $item->tipe }}">{{ $item->tipe }}</option>
                                        @empty
                                            <option value="empty">data tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">No. Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " value="#" name="letter_no" placeholder="Nomor Surat.." required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_date" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" value="#" name="letter_date" required>
                                </div>
                                
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="regarding" class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="#" name="regarding" placeholder="Perihal.." required>
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">Departemen</label>
                                <div class="col-sm-9">
                                    <select name="department_id" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        @forelse ($departements as $data)
                                            <option value="{{ $data->nama_departement }}">{{ $data->nama_departement }}</option>
                                        @empty
                                        <option value="empty">data tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" value="#" name="letter_file" accept="application/pdf" required>
                                    <div id="letter_file" class="form-text">Ekstensi .pdf</div>
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