@extends('layouts.master')
@section('title', 'WASPAS | Tambah Penyakit')
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
                            Tambah Penyakit
                        </h2>
                        <hr class="my-1">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">

                    <div class="col-lg-12">
                        <form class="card" action="/penyakit-store" method="post">
                            @csrf
                            <div class="card-header">
                                <a href="/penyakit">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="kode">Kode Penyakit</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                        placeholder="..." value="{{ old('kode') }}" name="kode" id="kode">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="nama">Nama Penyakit</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="..." value="{{ old('nama') }}" name="nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="bobot">Bobot Penyakit</label>
                                    <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                                        placeholder="..." value="{{ old('bobot') }}" name="bobot" id="bobot" min=”0″
                                        step="any">
                                    <small class="form-hint">min bobot adalah 1 dan max bobot adalah 10</small>
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
