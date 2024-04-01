@extends('layouts.master')
@section('title', 'TAHANI | Kriteria')
@section('content')

    <main id="main">
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/kriteria">Kriteria & Sub Kriteria</a></li>
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

        <section class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Daftar Kriteria</h6>
                            <a href="/kriteria-add" type="button" class="btn btn-primary-faded btn-sm">Tambah
                                Kriteria <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- /user listing Actions-->

                            <!-- User Listing Table-->
                            <div class="table-responsive">
                                <table class="table m-0 table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- <th>Sub Kriteria</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $item)
                                            <tr>
                                                <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                <td>{{ $item->nama }}</td>
                                                {{-- <td>
                                                    @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                        @foreach ($item->kriteria_sub_kriteria as $item2)
                                                            <li>
                                                                {{ $item2->nama }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span class="badge rounded-pill bg-danger-faded text-danger">Sub
                                                                Kriteria
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <a href="kriteria-edit/{{ $item->id }}"><i
                                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                    <span class="px-1 fw-bold">|</span>
                                                    <a href="#" onclick="hapus('{{ $item->id }}','kriteria')"><i
                                                            class="fa-solid fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /User Listing Table-->

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Daftar Sub Kriteria</h6>
                            <a href="/sub_kriteria-add" type="button" class="btn btn-primary-faded btn-sm">Tambah
                                Sub Kriteria <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- /user listing Actions-->

                            <!-- User Listing Table-->
                            <div class="table-responsive">
                                <table class="table m-0 table-striped" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- <th>kriteria</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_kriteria as $item)
                                            <tr>
                                                <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                <td>{{ $item->nama }}</td>
                                                {{-- <td>
                                                    @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                        @foreach ($item->kriteria_sub_kriteria as $item2)
                                                            <li> {{ $item2->nama }}</li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span
                                                                class="badge rounded-pill bg-danger-faded text-danger">Kriteria
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <a href="sub_kriteria-edit/{{ $item->id }}"><i
                                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                    <span class="px-1 fw-bold">|</span>
                                                    <a href="#"
                                                        onclick="hapus('{{ $item->id }}','sub_kriteria')"><i
                                                            class="fa-solid fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /User Listing Table-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Daftar Sub Kriteria pada Kriteria</h6>
                            <a href="/kriteria_sub_kriteria-add" type="button" class="btn btn-primary-faded btn-sm">Tambah
                                Sub
                                Kriteria pada
                                Kriteria <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- /user listing Actions-->

                            <!-- User Listing Table-->
                            <div class="table-responsive">
                                <table class="table m-0 table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Range Awal</th>
                                            <th>Range Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $item)
                                            <tr>
                                                <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                        @foreach ($item->kriteria_sub_kriteria as $item2)
                                                            <li>
                                                                {{ $item2->sub_kriteria->nama }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span class="badge rounded-pill bg-danger-faded text-danger">Sub
                                                                Kriteria
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                        @foreach ($item->kriteria_sub_kriteria as $item3)
                                                            <li>
                                                                {{ $item3->range_awal }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span
                                                                class="badge rounded-pill bg-danger-faded text-danger">Range
                                                                awal
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                        @foreach ($item->kriteria_sub_kriteria as $item4)
                                                            <li>
                                                                @if ($item4->range_akhir !== null)
                                                                    {{ $item4->range_akhir }}
                                                                @else
                                                                    Tak Terhingga
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span
                                                                class="badge rounded-pill bg-danger-faded text-danger">Range
                                                                akhir
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($item->kriteria_sub_kriteria as $item4)
                                                        <a href="kriteria_sub_kriteria-edit/{{ $item4->id }}"><i
                                                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                        <span class="px-1 fw-bold">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item4->id }}','kriteria_sub_kriteria')"><i
                                                                class="fa-solid fa-trash text-danger"></i></a><br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /User Listing Table-->

                        </div>
                    </div>
                </div>


            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

@endsection
