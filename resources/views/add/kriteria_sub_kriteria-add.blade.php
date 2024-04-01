@extends('layouts.master')
@section('title', 'TAHANI | Tambah Data Sub Kriteria pada Kriteria')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/kriteria">Kriteria & Sub Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Sub Kriteria pada Kriteria</li>
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
            {{-- <a href="/faskes" type="button" class="col-lg-2 col-sm-3 btn mb-2 btn-primary-faded btn-sm"><i
                    class="fa-solid fa-caret-left"></i> Kembali
            </a> --}}
            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Tambah data</h6>
                </div>
                <div class="card-body">
                    <form action="/kriteria_sub_kriteria-store" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="sub_kriteria_id" class="form-label">Sub Kriteria</label>
                                <select class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                    id="kriteria_sub_kriteria_id" name="sub_kriteria_id">
                                    <option value="" selected disabled>Pilih Sub Kriteria ...
                                    </option>
                                    @foreach ($sub_kriteria as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('sub_kriteria_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                <select class="form-select @error('kriteria_id') is-invalid @enderror" id="kriteria_id"
                                    name="kriteria_id">
                                    <option value="" selected disabled>Pilih Sub Kriteria terlebih dahulu ...
                                    </option>
                                </select>
                                @error('kriteria_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="range_awal" class="form-label">Range Awal</label>
                                <input type="number" class="form-control @error('range_awal') is-invalid @enderror"
                                    id="range_awal" name="range_awal" placeholder="..." step="any"
                                    value="{{ old('range_awal') }}">
                                @error('range_awal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="range_akhir" class="form-label">Range Akhir</label>
                                <input type="number" class="form-control @error('range_akhir') is-invalid @enderror"
                                    id="range_akhir" name="range_akhir" placeholder="..." step="any"
                                    value="{{ old('range_akhir') }}">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="infinityChck" name="infinity">
                                    <label class="form-check-label" for="infinityChck">Centang jika nilai adalah tak
                                        terhingga</label>
                                </div>
                                {{-- <div class="form-text">Jika tak terhingga maka disimbolkan dengan "-" </div> --}}
                                @error('range_akhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <a href="/kriteria" class="btn btn-outline-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <script>
        $('#infinityChck').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).parent('div').siblings('input').attr('disabled', 'true')
                $(this).parent('div').siblings('input').attr('type', 'text')
                $(this).parent('div').siblings('input').val('Tak terhingga')
            } else {
                $(this).parent('div').siblings('input').removeAttr('disabled', 'true')
                $(this).parent('div').siblings('input').attr('type', 'number')
                $(this).parent('div').siblings('input').val('')
            }
        })
    </script>
    <!-- /Page Content -->
@endsection
