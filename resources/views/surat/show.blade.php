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
                            Detail Surat
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali Ke Semua Surat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="row gx-4">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Surat</div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>{{ $surats->nomor_surat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Surat</th>
                                        <td>{{ $surats->tanggal_surat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Perihal</th>
                                        <td>{{ $surats->perihal }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <embed src="/assets/letter-file/{{$surats->letter_file}}" width="700" height="750" type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection