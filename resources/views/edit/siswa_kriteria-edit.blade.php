@extends('layouts.master')
@section('title', 'TAHANI | Ubah Data Kriteria pada Siswa')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/siswa">Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kriteria pada Siswa</li>
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
            {{-- <a href="/kecamatan" type="button" class="col-lg-2 col-sm-3 btn mb-2 btn-primary-faded btn-sm"><i
                    class="fa-solid fa-caret-left"></i> Kembali
            </a> --}}
            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Edit data Kriteria pada Siswa</h6>
                </div>
                <div class="card-body">
                    <form action="/siswa_kriteria-update/{{ $siswa_kriteria->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label class="form-label" for="siswa_id">Siswa</label>
                                <input type="text" class="form-control @error('siswa_id') is-invalid @enderror"
                                    value="{{ $siswa_kriteria->siswa->nama }}" id="siswa_id" disabled>
                                <input type="hidden" value="{{ $siswa_kriteria->siswa_id }}" name="siswa_id">
                                @error('siswa_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="kriteria_id" class="form-label"> Kriteria</label>
                                <select class="form-select mb-3 @error('kriteria_id') is-invalid @enderror"
                                    aria-label=".form-select example" id="kriteria_id" name="kriteria_id">
                                    @foreach ($kriteria as $item)
                                        @php
                                            $temp = false;
                                        @endphp
                                        <option value="{{ $item->id }}"
                                            @foreach ($item->siswa_kriteria as $item2) 
                                            @if ($item2->siswa_id == $siswa_kriteria->siswa_id && $item2->kriteria_id == $siswa_kriteria->kriteria_id)
                                            selected
                                            @endif 
                                            @if ($item2->siswa_id == $siswa_kriteria->siswa_id && $item2->kriteria_id != $siswa_kriteria->kriteria_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                            {{ $item->nama }} @if ($temp == true)
                                                (sudah dipilih!)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('kriteria_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="bobot" class="form-label">Bobot</label>
                                <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                    id="bobot" name="bobot" step="any" value="{{ $siswa_kriteria->bobot }}">
                                @error('bobot')
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
