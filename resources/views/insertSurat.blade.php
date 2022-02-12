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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    //comment
                    {{-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                                        <option value="Surat Masuk" #>Surat Masuk</option>
                                        <option value="Surat Keluar" #>Surat Keluar</option>
                                    </select>
                                </div>
                                @error('letter_type')
                                    <div class="invalid-feedback">
                                        bla
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">No. Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('letter_no') is-invalid @enderror" value="#" name="letter_no" placeholder="Nomor Surat.." required>
                                </div>
                                @error('letter_no')
                                    <div class="invalid-feedback">
                                        bla
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_date" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('letter_date') is-invalid @enderror" value="#" name="letter_date" required>
                                </div>
                                @error('letter_date')
                                    <div class="invalid-feedback">
                                        bla
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="regarding" class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('regarding') is-invalid @enderror" value="#" name="regarding" placeholder="Perihal.." required>
                                </div>
                                @error('regarding')
                                    <div class="invalid-feedback">
                                       bla
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">Departemen</label>
                                <div class="col-sm-9">
                                    <select name="department_id" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        <option value="Surat">Surat 1</option>
                                        <option value="Surat-Satu">Surat 2</option>
                                        <option value="Surat-Dua">Surat 3</option>
                                        <option value="Surat-Tiga">Surat 4</option>
                                        <option value="Surat-Empat">Surat 5</option>
                                        <option value="Surat-Lima">Surat 6</option>
                                    </select>
                                </div>
                                @error('department_id')
                                    <div class="invalid-feedback">
                                        bla
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" value="#" name="letter_file" accept="application/pdf" required>
                                    <div id="letter_file" class="form-text">Ekstensi .pdf</div>
                                </div>
                                @error('letter_file')
                                    <div class="invalid-feedback">
                                        bla
                                    </div>
                                @enderror
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