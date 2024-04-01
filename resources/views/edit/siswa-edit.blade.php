@extends('layouts.master')
@section('title', 'TAHANI | Edit Siswa')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/siswa">Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
            {{-- <a href="/siswa" type="button" class="col-lg-2 col-sm-3 btn mb-2 btn-primary-faded btn-sm"><i
                    class="fa-solid fa-caret-left"></i> Kembali
            </a> --}}
            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Edit data siswa</h6>
                </div>
                <div class="card-body">
                    <form action="/siswa-update/{{ $siswa->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ $siswa->nama }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3">

                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis"
                                    name="nis" value="{{ $siswa->nis }}">
                                @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mb-3">

                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label=".form-select example" name="jk">
                                    {{-- <option selected="" disabled>Pilih jenis kelamin ...</option> --}}
                                    @foreach ($jk as $item)
                                        <option value="{{ $item }}"
                                            @if ($siswa->jk == $item) selected @endif>{{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="datepicker" class="form-label">Tanggal lahir</label>
                                {{-- <div class="col-sm-4"> --}}
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">

                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-calendar" style="height: 20px"></i>
                                        </span>
                                    </span>
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-lg-3 mb-3">

                                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label=".form-select example" id="kecamatan_id"
                                    name="kecamatan_id">
                                    @if (isset($siswa->kecamatan_id))
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($siswa->kecamatan_id == $item->id) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option selected="" disabled>Pilih Kecamatan ...</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('kecamatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                    aria-label=".form-select example" id="kelurahan_id" name="kelurahan_id">
                                    @if (isset($siswa->kecamatan_id))
                                        @foreach ($kelurahan as $item)
                                            @php
                                                $valid = true;
                                            @endphp
                                            @foreach ($kecamatan as $item2)
                                                @if ($item2->id == $siswa->kecamatan_id)
                                                    @if ($item->kecamatan_id == $item2->id)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $siswa->kelurahan_id) selected @endif>
                                                            {{ $item->nama }}
                                                        </option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @else
                                        <option selected disabled>Pilih Kecamatan terlebih dahulu ...</option>
                                    @endif
                                </select>
                                @error('kelurahan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="col-lg-3 mb-3">

                                <label for="tingkat_id" class="form-label">Tingkat</label>
                                <select class="form-select" aria-label=".form-select example" id="tingkat_id"
                                    name="tingkat_id">
                                    <option selected="" disabled>Pilih Tingkat ...</option>
                                    @foreach ($tingkat as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($siswa->tingkat_id == $item->id) selected @endif>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tingkat_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select class="form-select @error('kelas_id') is-invalid @enderror"
                                    aria-label=".form-select example" id="kelas_id" name="kelas_id">

                                    @if (isset($siswa->kelas_id))
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $siswa->kelas_id) selected @endif>{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option selected disabled>Pilih Tingkat terlebih dahulu ...</option>
                                    @endif

                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <a href="/siswa" class="btn btn-outline-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
