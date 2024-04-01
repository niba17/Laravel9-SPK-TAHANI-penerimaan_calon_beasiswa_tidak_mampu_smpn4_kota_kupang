@extends('layouts.master')
@section('title', 'TAHANI | Tambah Kelurahan')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/kecamatan">Kecamatan & Kelurahan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kelurahan</li>
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
                    <h6 class="card-title m-0">Tambah data Kelurahan</h6>
                </div>
                <div class="card-body">
                    <form action="/kelurahan-store" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-4">

                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="..." value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}

                            </div>
                            <div class="col-lg-4">
                                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                    aria-label=".form-select example" id="kecamatan_id" name="kecamatan_id">
                                    <option selected="" disabled>Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <a href="/kecamatan" class="btn btn-outline-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
