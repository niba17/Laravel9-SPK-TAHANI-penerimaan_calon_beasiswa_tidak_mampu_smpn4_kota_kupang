@extends('layouts.master')
@section('title', 'TAHANI | Home')
@section('content')

    <!-- Page Content -->
    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/home">Home</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                    </ol>
                </nav>
                {{-- <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> New
                        Project</a>
                    <a class="btn btn-sm btn-primary-faded ms-2" href="#"><i
                            class="ri-settings-3-line align-bottom"></i> Settings</a>
                    <a class="btn btn-sm btn-secondary-faded ms-2 text-body" href="#"><i
                            class="ri-question-line align-bottom"></i> Help</a>
                </div> --}}
            </div>
        </div> <!-- / Breadcrumbs-->

        <!-- Content-->
        <section class="container-fluid">

            <!-- Top Row Widgets-->
            <div class="row g-4">

                <!-- Number Orders Widget-->
                <div class="col-12 col-lg-6">
                    <a href="/akun" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Akun
                                @if (count($akun) > 0)
                                    ( {{ count($akun) }} )
                                @else
                                    ( <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span> )
                                @endif
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"> <i class="fa-solid fa-users-line fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- / Number Orders Widget-->

                <!-- Number Orders Widget-->
                <div class="col-12 col-lg-6">
                    <a href="/siswa" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Siswa
                                @if (count($siswa) > 0)
                                    ( {{ count($siswa) }} )
                                @else
                                    ( <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span> )
                                @endif
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"><i class="fa-solid fa-people-group fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- / Number Orders Widget-->

                <!-- Number Orders Widget-->
                <div class="col-12 col-lg-6">
                    <a href="/tingkat" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Tingkat &
                                Kelas
                                {{-- <br> --}}
                                ( @if (count($tingkat) > 0)
                                    {{ count($tingkat) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif
                                |
                                @if (count($kelas) > 0)
                                    {{ count($kelas) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif )
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"><i class="fa-solid fa-chart-simple fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- / Number Orders Widget-->

                <!-- Number Orders Widget-->
                <div class="col-12 col-lg-6">
                    <a href="/kriteria" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Kriteria &
                                Sub Kriteria
                                {{-- <br> --}}
                                (@if (count($kriteria) > 0)
                                    {{ count($kriteria) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif
                                |
                                @if (count($sub_kriteria) > 0)
                                    {{ count($sub_kriteria) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif )
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"><i class="fa-solid fa-solid fa-gear fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- / Number Orders Widget-->

                <!-- Number Orders Widget-->
                {{-- <div class="col-12 col-lg-6">
                    <a href="/kecamatan" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Kecamatan &
                                Kelurahan
                                ( @if (count($kecamatan) > 0)
                                    {{ count($kecamatan) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif
                                |
                                @if (count($kelurahan) > 0)
                                    {{ count($kelurahan) }}
                                @else
                                    <span class="badge rounded-pill bg-danger-faded text-danger"
                                        style="font-size: 10px;">Belum
                                        ada
                                        data
                                    </span>
                                @endif )
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"><i class="fa-solid fa-solid fa-gear fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
                <!-- / Number Orders Widget-->

                <!-- Number Orders Widget-->
                <div class="col-12 col-lg-6">
                    <a href="/perhitungan-derajat_keanggotaan" class="card h-100 card-home">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title m-0 text-muted fs-md text-uppercase fw-bolder tracking-wide">Perhitungan
                                ( Fuzzy Tahani )
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 md-1">
                                <div class="col-12 col-md-6">
                                    <p class="fs-3 fw-bold d-flex align-items-center">
                                        <span class="fs-9 me-1"><i class="fa-solid fa-solid fa-square-root-variable fa-5x"
                                                style="color:#003AC8;"></i>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- / Number Orders Widget-->
            </div>
            <!-- / Top Row Widgets-->
            </div> <!-- / Footer-->

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

@endsection
