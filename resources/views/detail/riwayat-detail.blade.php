@extends('layouts.master')
@section('title', 'WASPAS | Hasil Diagnosa')
@section('content')

    <div class="page-wrapper">

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">

                    <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-12">
                                <div class="card card-md">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-primary">
                                            <i class="fa-solid fa-stethoscope mt-4 me-4" style="font-size: 100px;"></i>
                                            {{-- <i class="fa-regular fa-hand mt-3" style="font-size: 100px;"></i> --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-10">
                                                <h3 class="h1">Hasil Diagnosa {{ Auth::user()->nama }}</h3>
                                                <div class="markdown text-muted">Berdasarkan hasil pengamatan User terhadap
                                                    gejala yang dialami (<i style="color:#206BC4;">evidence</i>) maka sistem
                                                    mendapatkan hasil melalui perhitungan <span style="color:#206BC4;">Bayes
                                                        Theorem</span> yang
                                                    telah diurutkan berdasarkan probabilitas penyakit yang tertinggi sampai
                                                    yang
                                                    terendah (<i style="color:#206BC4;">descending</i>) dibawah ini.
                                                </div>
                                                {{-- <div class="mt-3">
                                                    <a href="https://tabler-icons.io" class="btn btn-primary"
                                                        target="_blank" rel="noopener">Download icons</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 py-2 align-items-center">
                    <div class="col">
                        <div class="page-title">
                            <a href="/riwayat" class="btn btn-primary">
                                Kembali
                            </a>
                        </div>
                    </div>
                    <!-- Page title actions -->
                    {{-- <div class="col-auto ms-auto d-print-none">
                        <form action="/perhitungan-simpan" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_name" value="{{ Auth::user()->nama }}">
                            <input type="hidden" name="save_date_time" value="{{ $date }}">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($arrEvidence as $item => $value)
                                <input type="hidden" name="evidence[{{ $i }}][kode]"
                                    value="@php echo($value['kode']) @endphp">
                                <input type="hidden" name="evidence[{{ $i }}][nama]"
                                    value="@php echo($value['nama']) @endphp">
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($bayes as $item)
                                <input type="hidden" name="hipotesa[{{ $i }}][kode]"
                                    value="@php echo($item['kode_penyakit']) @endphp">
                                <input type="hidden" name="hipotesa[{{ $i }}][nama]"
                                    value="@php echo($item['penyakit']) @endphp">
                                <input type="hidden" name="hipotesa[{{ $i }}][probabilitas]"
                                    value="@php echo($item['probabilitas']) @endphp">
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </div> --}}
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            Import PDF / Cetak
                        </button>
                    </div>
                </div>

                <!-- Page body -->

                <div class="card card-lg" id="section-to-print">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-6">
                                <p class="h3">{{ Auth::user()->nama }}</p>
                                <address>
                                    Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ltd@example.com
                                </address>
                            </div> --}}
                            {{-- <div class="col-6 text-end">
                                <p class="h3">Client</p>
                                <address>
                                    Street Address<br>
                                    State, City<br>
                                    Region, Postal Code<br>
                                    ctr@example.com
                                </address>
                            </div> --}}
                            <div class="col-12 my-4">
                                <h2 class="h3 mb-5">{{ Auth::user()->nama . ' / ' . $date }}</h1>
                                    <h1 class="text-center">HASIL DIAGNOSA SISTEM PAKAR</h1>
                                    <hr>
                                    <h3>Gejala yang dipilih :
                                </h2>
                                @foreach ($save_evidence_fix as $item => $value)
                                    <li>
                                        <span style="color:#4299E1;">{{ '(' . $value['kode'] . ')' }}</span>
                                        <span>{{ $value['nama'] }}</span>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center" style="width: 1%"></th> --}}
                                    <th>No</th>
                                    <th>Kode Penyakit</th>
                                    <th>Nama Penyakit</th>
                                    <th>Probabilitas</th>
                                    {{-- <th class="text-center" style="width: 1%">Qnt</th>
                                    <th class="text-end" style="width: 1%">Unit</th>
                                    <th class="text-end" style="width: 1%">Amount</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($save_hipotesa_fix as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="color:#4299E1;">{{ $item['kode'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['probabilitas'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-muted text-center mt-5 h5">SISTEM PAKAR DIAGNOSA TANAMAN BUAH NAGA - BAYES
                            THEOREM</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
@endsection
