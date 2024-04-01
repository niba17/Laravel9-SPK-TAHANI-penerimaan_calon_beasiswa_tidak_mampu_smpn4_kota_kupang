@extends('layouts.master')
@section('title', 'TAHANI | Query Penentuan')
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
                        <li class="breadcrumb-item active"><a href="/perhitungan-derajat_keanggotaan">Derajat Keanggotaan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Query Penentuan</li>
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

            <a href="/perhitungan-derajat_keanggotaan" type="button" class="btn btn-primary-faded btn-sm col-2 mb-2">
                <i class="fa-solid fa-left-long"></i> Derajat Keanggotaan
            </a>

            <div class="card mb-4">
                <div class="card-header justify-content-center align-items-center">
                    <h6 class="card-title m-0">Hasil Query Penentuan</h6>
                    <div>
                        <div class="form-text mb-1">Tentukan derajat keanggotaan dari kriteria dibawah ini untuk query
                            penentuan
                        </div>
                        <hr>
                        <form action="/perhitungan-query_penentuan" method="post">
                            @csrf
                            <div class="row align-items-center" style="margin-inline-start:1px;">
                                @php
                                    $i = 0;
                                @endphp

                                @if ($condition == false)

                                    @foreach ($kriteria as $item_kriteria)
                                        <div class="col-lg-3 p-0">
                                            <label class="form-label"
                                                for="kriteria_id_sub_kriteria_id[{{ $item_kriteria->id }}]">{{ $item_kriteria->nama }}</label>
                                            <select class="form-select form-select-md my-1" style="width:200px;"
                                                aria-label=".form-select-sm example"
                                                id="kriteria_id_sub_kriteria_id[{{ $item_kriteria->id }}]"
                                                name="kriteria_id_sub_kriteria_id[{{ $item_kriteria->id }}]">
                                                <option selected disabled>Pilih {{ $item_kriteria->nama }} ...</option>
                                                @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                    <option value="{{ $item_kriteria_sub_kriteria->sub_kriteria->id }}">
                                                        {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($kriteria as $item_kriteria)
                                        <div class="col-lg-3 p-0">
                                            <label class="form-label"
                                                for="kriteria_id_sub_kriteria_id[{{ $item_kriteria->id }}]">{{ $item_kriteria->nama }}</label>
                                            <select class="form-select form-select-md me-2 my-1" style="width:200px;"
                                                aria-label=".form-select-sm example"
                                                name="kriteria_id_sub_kriteria_id[{{ $item_kriteria->id }}]">
                                                <option selected disabled>Pilih {{ $item_kriteria->nama }} ...</option>
                                                @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                    @php
                                                        $valid = false;
                                                    @endphp
                                                    @foreach ($request->all() as $key_request => $item_request)
                                                        @if ($key_request !== '_token')
                                                            @foreach ($item_request as $key2 => $item2)
                                                                @if ($key2 == $item_kriteria->id)
                                                                    @if ($item_kriteria_sub_kriteria->sub_kriteria->id == $item2)
                                                                        @php
                                                                            $valid = true;
                                                                        @endphp
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ $item_kriteria_sub_kriteria->sub_kriteria->id }}"
                                                        @if ($valid == true) selected @endif>
                                                        {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @php
                                                $i++;
                                            @endphp
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary-faded btn-sm col-2 mt-2"
                                style="height:42px;">Submit</button>

                        </form>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @php
                        dd($condition);
                    @endphp --}}
                    <!-- User Listing Table-->
                    <div class="table-responsive">
                        <table class="table m-0 table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    @foreach ($kriteria as $item_kriteria)
                                        <th>{{ $item_kriteria->nama }}</th>
                                    @endforeach
                                    <th>Rekomendasi Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($condition == false)
                                @else
                                    @foreach ($fuzzy_tahani as $item_fuzzy_tahani)
                                        @php
                                            $rekomendasi = 0;
                                        @endphp
                                        <tr>
                                            <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                            <td>{{ $item_fuzzy_tahani['siswa']['siswa_nama'] }}</td>
                                            <td>{{ $item_fuzzy_tahani['siswa']['siswa_nis'] }}</td>
                                            @foreach ($item_fuzzy_tahani['derajat_keanggotaan'] as $item_fuzzy_tahani_derajat_keanggotaan)
                                                @foreach ($request->all() as $key_request => $item_request)
                                                    @if ($key_request !== '_token')
                                                        @foreach ($item_request as $key2 => $item2)
                                                            @if ($item_fuzzy_tahani_derajat_keanggotaan['kriteria_id'] == $key2)
                                                                @foreach ($item_fuzzy_tahani_derajat_keanggotaan['sub_kriteria'] as $item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria)
                                                                    @if ($item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria['sub_kriteria_id'] == $item2)
                                                                        <td>{{ round($item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria['bobot_derajat_keanggotaan'], 3, PHP_ROUND_HALF_UP) }}
                                                                        </td>
                                                                        @php
                                                                            $rekomendasi = $rekomendasi + $item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria['bobot_derajat_keanggotaan'];
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <td>{{ round($rekomendasi / count($kriteria), 3, PHP_ROUND_HALF_UP) }}</td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

@endsection
