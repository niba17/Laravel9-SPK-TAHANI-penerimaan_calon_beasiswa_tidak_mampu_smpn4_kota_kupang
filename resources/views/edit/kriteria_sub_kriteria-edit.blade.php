@extends('layouts.master')
@section('title', 'TAHANI | Ubah Data Sub Kriteria pada Kriteria')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/kriteria">Kriteria & Sub Kriteria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sub Kriteria pada Kriteria</li>
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
                    <h6 class="card-title m-0">Edit data Sub Kriteria pada Kriteria</h6>
                </div>
                <div class="card-body">
                    <form action="/kriteria_sub_kriteria-update/{{ $kriteria_sub_kriteria->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label" for="kriteria_id">Kriteria</label>
                                <input type="text" class="form-control @error('kriteria_id') is-invalid @enderror"
                                    value="{{ $kriteria_sub_kriteria->kriteria->nama }}" id="kriteria_id" disabled>
                                <input type="hidden" value="{{ $kriteria_sub_kriteria->kriteria_id }}" name="kriteria_id">
                                @error('kriteria_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="sub_kriteria_id" class="form-label">Sub Kriteria</label>
                                <select class="form-select mb-3 @error('sub_kriteria_id') is-invalid @enderror"
                                    aria-label=".form-select example" id="sub_kriteria_id" name="sub_kriteria_id">
                                    @foreach ($sub_kriteria as $item)
                                        @php
                                            $temp = false;
                                        @endphp
                                        <option value="{{ $item->id }}"
                                            @foreach ($item->kriteria_sub_kriteria as $item2) 
                                            @if (
                                                $item2->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item2->sub_kriteria_id == $kriteria_sub_kriteria->sub_kriteria_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item2->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item2->sub_kriteria_id != $kriteria_sub_kriteria->sub_kriteria_id)
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
                            <div class="col-lg-6">
                                <label for="range_awal" class="form-label">Range Awal</label>
                                <input type="number" class="form-control @error('range_awal') is-invalid @enderror"
                                    id="range_awal" name="range_awal" step="any"
                                    value="{{ $kriteria_sub_kriteria->range_awal }}">
                                @error('range_awal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="range_akhir" class="form-label">Range Akhir</label>
                                <input class="form-control @error('range_akhir') is-invalid @enderror" id="range_akhir"
                                    name="range_akhir"
                                    @if ($kriteria_sub_kriteria->range_akhir !== null) type="number" step="any" value="{{ $kriteria_sub_kriteria->range_akhir }}"
                                    @else
                                    type="text" value='Tak terhingga' placeholder="..." @endif>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="infinityChck" name="infinity">
                                    <label class="form-check-label" for="infinityChck">Centang jika nilai
                                        adalah tak
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
        @if ($kriteria_sub_kriteria->range_akhir == null)
            $('#infinityChck').attr('checked', '')
            $('#infinityChck').parent('div').siblings('input').attr('disabled', 'true')
        @endif
        $('#infinityChck').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).parent('div').siblings('input').attr('disabled', 'true')
                $(this).parent('div').siblings('input').attr('type', 'text')
                $(this).parent('div').siblings('input').val('Tak terhingga')
            } else {
                $(this).parent('div').siblings('input').removeAttr('disabled', 'true')
                $(this).parent('div').siblings('input').attr('type', 'number')
                $(this).parent('div').siblings('input').val('{{ $kriteria_sub_kriteria->range_akhir }}')
            }
        })
    </script>

    <!-- /Page Content -->
@endsection
