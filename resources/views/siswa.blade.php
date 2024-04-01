@extends('layouts.master')
@section('title', 'TAHANI | Siswa')
@section('content')

    <main id="main">
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/siswa">Siswa</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                    </ol>
                </nav>
                {{-- <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> New
                    Project</a>
                <a class="btn btn-sm btn-primary-faded ms-2" href="#"><i class="ri-settings-3-line align-bottom"></i>
                    Settings</a>
                <a class="btn btn-sm btn-secondary-faded ms-2 text-body" href="#"><i
                        class="ri-question-line align-bottom"></i> Help</a>
            </div> --}}
            </div>
        </div> <!-- / Breadcrumbs-->

        <section class="container-fluid">

            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Daftar Siswa</h6>
                    <a href="/siswa-add" type="button" class="btn btn-primary-faded btn-sm">Tambah
                        Siswa <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <!-- User Listing Table-->
                    <div class="table-responsive">
                        <table class="table m-0 table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal lahir</th>
                                    {{-- <th>Kecamatan</th>
                                    <th>Kelurahan</th> --}}
                                    <th>Tingkat</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->jk }}</td>
                                        <td>{{ $item->tgl_lahir }}</td>
                                        {{-- <td>
                                            @if (isset($item->kecamatan->nama))
                                                {{ $item->kecamatan->nama }}
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($item->kelurahan->nama))
                                                {{ $item->kelurahan->nama }}
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if (isset($item->tingkat->nama))
                                                {{ $item->tingkat->nama }}
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($item->kelas->nama))
                                                {{ $item->kelas->nama }}
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="siswa-edit/{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square text-primary"></i></a>
                                            <span class="px-1 fw-bold">|</span>
                                            <a href="#" onclick="hapus('{{ $item->id }}','siswa')"><i
                                                    class="fa-solid fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Daftar Siswa & Kriteria</h6>
                    <a href="/siswa_kriteria-add" type="button" class="btn btn-primary-faded btn-sm">Tambah
                        Kriteria pada Siswa <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table m-0 table-striped" id="myTable2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>Kriteria</th> --}}
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $item)
                                    <tr>
                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            @if (isset($item->siswa_kriteria) && count($item->siswa_kriteria) > 0)
                                                @foreach ($item->siswa_kriteria as $item2)
                                                    <li>{{ $item2->kriteria->nama }}</li>
                                                @endforeach
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Kriteria
                                                        belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($item->siswa_kriteria) && count($item->siswa_kriteria) > 0)
                                                @foreach ($item->siswa_kriteria as $item3)
                                                    <li>{{ $item3->bobot }}</li>
                                                @endforeach
                                            @else
                                                <span class="text-danger">
                                                    <span class="badge rounded-pill bg-danger-faded text-danger">Bobot belum
                                                        dipilih!</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($item->siswa_kriteria))
                                                @foreach ($item->siswa_kriteria as $item4)
                                                    <a href="siswa_kriteria-edit/{{ $item4->id }}"><i
                                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                    <span class="px-1 fw-bold">|</span>
                                                    <a href="#"
                                                        onclick="hapus('{{ $item4->id }}','siswa_kriteria')"><i
                                                            class="fa-solid fa-trash text-danger"></i></a><br>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
