@extends('layouts.master')
@section('title', 'BAYES | Tambah Data Pakar')
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
                            Tambah Data Pakar
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
                        <form class="card" action="/pakar-store" method="post">
                            @csrf
                            <div class="card-header">
                                <a href="/pakar">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="penyakit_id">Penyakit</label>
                                    <div>
                                        <select class="form-select @error('penyakit_id') is-invalid @enderror"
                                            name="penyakit_id" id="penyakit_id">
                                            <option selected disabled>Pilih Penyakit</option>
                                            @foreach ($penyakit as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ '(' . $item->kode . ') ' . $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penyakit_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="gejala_id">Gejala</label>
                                    <div>
                                        <select class="form-select @error('gejala_id') is-invalid @enderror"
                                            name="gejala_id" id="gejala_id">
                                            <option selected disabled>Pilih Penyakit terlebih dahulu</option>
                                        </select>
                                        @error('gejala_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4  p-1">
                                    <label class="form-label" for="bobot">Bobot</label>
                                    <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                                        placeholder="..." value="{{ old('bobot') }}" name="bobot" id="bobot"
                                        autocomplete="off" min=”0″ step="any">
                                    <small class="form-hint">min bobot adalah 1 dan max bobot adalah 10</small>
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-4 p-1">
                                    <label class="form-label" for="bobot">Bobot</label>
                                    <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                        placeholder="..." value="{{ old('bobot') }}" name="bobot" id="bobot" min=”0″
                                        step="any">
                                    <small class="form-hint">min bobot adalah 1 dan max bobot adalah 10</small>
                                    @error('bobot')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
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
