@extends('layouts.master')
@section('title', 'BAYES | Riwayat')
@section('content')

    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        {{-- <div class="page-pretitle">
                            index
                        </div> --}}
                        <h2 class="page-title">
                            Riwayat
                        </h2>
                        <hr class="my-1">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        {{-- @php
            dd($save_evidence_fix);
        @endphp --}}
        @if (count($save_evidence_fix) > 0)
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($save_evidence_fix as $item => $value)
                            @if (Auth::user()->id == $value[$i]->user_id)
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-header card-header-light">
                                            <h3 class="card-title">{{ $value[$i]->save_date_time }}</h3>
                                        </div>
                                        <div class="card-stamp">
                                            <div class="card-stamp-icon bg-primary">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                                <i class="fa-solid fa-virus-covid"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{-- <h3 class="card-title">Card with icon bg</h3> --}}
                                            <h3>Gejala yang dipilih : {{ count($save_evidence_fix[$i]) }}</h3>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="/riwayat-detail/{{ $value[$i]['save_date_time'] }}"
                                                        class="btn btn-primary w-100">
                                                        Lihat
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="#" class="btn btn-outline-danger w-100"
                                                        onclick="hapus('{{ $value[$i]->save_date_time }}','riwayat')">
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @else

            <body class="border-top-wide border-primary d-flex flex-column theme-light" cz-shortcut-listen="true">
                <script src="./dist/js/demo-theme.min.js?1674944800"></script>
                <div class="page page-center">
                    <div class="container-tight py-4">
                        <div class="empty">
                            <div class="empty-img"><i class="fa-solid fa-skull-crossbones" style="font-size:200px;"></i>
                            </div>
                            <p class="empty-title">Belum ada riwayat tersimpan</p>
                            <p class="empty-subtitle text-muted">
                                Mulai diagnosa lalu klik tombol "Simpan" agar kami dapat mengelola data riwayat anda.
                            </p>
                            <div class="empty-action">
                                <a href="/home" class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M5 12l6 6"></path>
                                        <path d="M5 12l6 -6"></path>
                                    </svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Libs JS -->
                <!-- Tabler Core -->
                <script src="./dist/js/tabler.min.js?1674944800" defer=""></script>
                <script src="./dist/js/demo.min.js?1674944800" defer=""></script>

            </body>
        @endif

    </div>

@endsection
