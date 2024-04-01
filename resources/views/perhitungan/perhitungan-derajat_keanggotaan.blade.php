@extends('layouts.master')
@section('title', 'TAHANI | Derajat Keanggotaan')
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
                        <li class="breadcrumb-item active" aria-current="page">Derajat Keanggotaan</li>
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

            <a href="/perhitungan-query_penentuan" type="button" class="btn btn-primary-faded btn-sm col-2 mb-2">Query
                Penentuan <i class="fa-solid fa-right-long"></i>
            </a>
            @php
                $i = 0;
            @endphp
            @foreach ($kriteria as $item_kriteria)
                {{-- @foreach ($fuzzy_tahani as $item_item_fuzzy_tahani)
                    @foreach ($item_item_fuzzy_tahani['kriteria'] as $item_item_fuzzy_tahani_kriteria) --}}
                <div class="card mb-4">
                    <div class="card-header justify-content-between align-items-center d-flex">
                        <h6 class="card-title m-0">Derajat Keanggotaan Kriteria
                            {{ $item_kriteria->nama }}
                        </h6>
                    </div>
                    <div class="card-body">

                        <!-- User Listing Table-->
                        <div class="table-responsive">
                            <table class="table table-striped"
                                @if ($i == 0) id="myTable"  @else id="myTable{{ $i + 1 }}" @endif>
                                <thead>
                                    <tr class="font-weight-bold table-primary">
                                        <th class="text-center align-middle" rowspan="2">
                                            No
                                        </th>
                                        <th class="text-center align-middle" rowspan="2">
                                            Nama
                                        </th>
                                        <th class="text-center align-middle" rowspan="2">
                                            {{ $item_kriteria->nama }}
                                        </th>
                                        <th class="text-center align-middle" colspan="5">Derajat Keanggotaan</th>
                                    </tr>
                                    <tr class="font-weight-bold" style="background-color:#ECBAE7;">
                                        @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                            <th class="text-center align-middle">
                                                {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fuzzy_tahani as $item_fuzzy_tahani)
                                        <tr>
                                            <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                            <td>{{ $item_fuzzy_tahani['siswa']['siswa_nama'] }}</td>
                                            @foreach ($item_fuzzy_tahani['kriteria'] as $item_item_fuzzy_tahani_kriteria)
                                                @if ($item_kriteria->id == $item_item_fuzzy_tahani_kriteria['kriteria_id'])
                                                    <td class="text-center">
                                                        {{ $item_item_fuzzy_tahani_kriteria['kriteria_bobot'] }}</td>
                                                @endif
                                            @endforeach
                                            @foreach ($item_fuzzy_tahani['derajat_keanggotaan'] as $item_item_fuzzy_tahani_derajat_keanggotaan)
                                                @if ($item_kriteria->id == $item_item_fuzzy_tahani_derajat_keanggotaan['kriteria_id'])
                                                    @foreach ($item_item_fuzzy_tahani_derajat_keanggotaan['sub_kriteria'] as $item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria)
                                                        <td class="text-center">
                                                            {{ round($item_item_fuzzy_tahani_derajat_keanggotaan_sub_kriteria['bobot_derajat_keanggotaan'], 3, PHP_ROUND_HALF_UP) }}
                                                        </td>
                                                    @endforeach
                                                    {{-- <td>{{ $item_item_fuzzy_tahani_derajat_keanggotaan['kriteria_bobot'] }}
                                                    </td> --}}
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

@endsection
