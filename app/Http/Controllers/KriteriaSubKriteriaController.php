<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaSubKriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaSubKriteriaController extends Controller
{
    public function create()
    {
        $sub_kriteria = SubKriteria::get();

        return view('add.kriteria_sub_kriteria-add', ['sub_kriteria' => $sub_kriteria]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
            'range_awal' => 'required|gte:0|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib diisi!',

            'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',

            'range_awal.required' => 'Range Akhir wajib diisi!',
            'range_awal.gte' => 'Range Akhir mimal adalah 0!',
            'range_awal.numeric' => 'Range Akhir harus berupa angka!',
        ];

        if (isset($request->infinity) == false) {
            $rules = [
                'kriteria_id' => 'required',
                'sub_kriteria_id' => 'required',
                'range_awal' => 'required|gte:0|lt:range_akhir|numeric',
                'range_akhir' => 'required|gt:range_awal|gte:1|numeric',
            ];

            $messages = [
                'kriteria_id.required' => 'Kriteria wajib diisi!',

                'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',

                'range_awal.required' => 'Range Akhir wajib diisi!',
                'range_awal.gte' => 'Range Akhir minimal adalah 0!',
                'range_awal.lt' => 'Range Awal harus lebih kecil dari Range Akhir!',
                'range_awal.numeric' => 'Range Awal harus berupa angka!',

                'range_akhir.required' => 'Kriteria wajib diisi!',
                'range_akhir.gt' => 'Range Akhir harus lebih besar dari Range Awal!',
                'range_akhir.gte' => 'Range Akhir harus lebih besar dari 1!',
                'range_akhir.numeric' => 'Range Akhir harus berupa angka!',
            ];
        }

        $request->validate($rules, $messages);

        // if (is_numeric($request->range_awal) == false) {
        //     $error = \Illuminate\Validation\ValidationException::withMessages([
        //         'range_awal' => ['Range awal harus berupa angka!'],
        //     ]);
        //     throw $error;
        // }

        $result = KriteriaSubKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::findOrFail($id);

        return view('edit.kriteria_sub_kriteria-edit', ['kriteria_sub_kriteria' => $kriteria_sub_kriteria, 'sub_kriteria' => $sub_kriteria, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria_sub_kriteria = KriteriaSubKriteria::findOrFail($id);

        $rules = [
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
            'range_awal' => 'required|gte:0|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib diisi!',

            'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',

            'range_awal.required' => 'Range Awal wajib diisi!',
            'range_awal.gte' => 'Range Awal harus lebih besar dari 1!',
            'range_awal.numeric' => 'Range Awal harus berupa angka!',

        ];

        if (isset($request->infinity) == false) {
            $rules = [
                'kriteria_id' => 'required',
                'sub_kriteria_id' => 'required',
                'range_awal' => 'required|gte:0|lt:range_akhir|numeric',
                'range_akhir' => 'required|gt:range_awal|gte:1|numeric',
            ];

            $messages = [
                'kriteria_id.required' => 'Kriteria wajib diisi!',

                'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',

                'range_awal.required' => 'Range Awal wajib diisi!',
                'range_awal.gte' => 'Range Awal minimal adalah 0!',
                'range_awal.lt' => 'Range Awal harus lebih kecil dari Range Akhir!',
                'range_awal.numeric' => 'Range Awal harus berupa angka!',

                'range_akhir.required' => 'Kriteria wajib diisi!',
                'range_akhir.gt' => 'Range Akhir harus lebih besar dari Range Awal!',
                'range_akhir.gte' => 'Range Akhir harus lebih besar dari 1!',
                'range_akhir.numeric' => 'Range Akhir harus berupa angka!',

            ];
        }

        $request->validate($rules, $messages);

        $result = $kriteria_sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal diubah!');
        }

        return redirect('/kriteria');
    }

    public function destroy($id)
    {
        $kriteria_sub_kriteria = KriteriaSubKriteria::findOrFail($id);
        $result = $kriteria_sub_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal dihapus!');
        }

        return redirect('/kriteria');
    }
}
