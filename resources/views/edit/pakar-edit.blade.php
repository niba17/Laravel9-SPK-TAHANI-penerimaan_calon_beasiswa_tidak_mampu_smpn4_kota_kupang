@extends('layouts.master')
@section('title', 'WASPAS | Edit Data Pakar')
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
                            Edit Data Pakar
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
                        <form class="card" action="/pakar-update/{{ $pakar->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <a href="/pakar">
                                    <i class="fa-solid fa-left-long" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="penyakit_id">Penyakit</label>
                                    <input type="text" class="form-control @error('penyakit_id') is-invalid @enderror"
                                        value="{{ $pakar->penyakit->nama }}" id="penyakit_id" disabled>
                                    <input type="hidden" value="{{ $pakar->penyakit_id }}" name="penyakit_id">
                                    @error('penyakit_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 p-1">
                                    <label class="form-label" for="gejala_id">Penyakit</label>
                                    <div>
                                        <select class="form-select @error('gejala_id') is-invalid @enderror"
                                            name="gejala_id" id="gejala_id">
                                            @foreach ($gejala as $item)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item->id }}"
                                                    @foreach ($item->pakar as $item2) 
                                                        @if ($item2->penyakit_id == $pakar->penyakit_id && $item2->gejala_id == $pakar->gejala_id)
                                                        selected
                                                        @endif 
                                                        @if ($item2->penyakit_id == $pakar->penyakit_id && $item2->gejala_id != $pakar->gejala_id)
                                                        @php
                                                         $temp=true   
                                                        @endphp
                                                        class="text-danger" disabled
                                                        @endif @endforeach>
                                                    {{ '(' . $item->kode . ') ' . $item->nama }} @if ($temp == true)
                                                        (sudah dipilih!)
                                                    @endif
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
                                    <label class="form-label" for="bobot">Bobot</label>
                                    <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                        value="{{ $pakar->bobot }}" name="bobot" id="bobot" min=”0″ step="any">
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
