<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SiswaKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaKriteriaController extends Controller
{
    public function create()
    {
        $kriteria = Kriteria::get();

        return view('add.siswa_kriteria-add', ['kriteria' => $kriteria]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'kriteria_id' => 'required',
            'siswa_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'siswa_id.required' => 'Siswa wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        // if (is_numeric($request->range_awal) == false) {
        //     $error = \Illuminate\Validation\ValidationException::withMessages([
        //         'range_awal' => ['Range awal harus berupa angka!'],
        //     ]);
        //     throw $error;
        // }

        $result = SiswaKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/siswa');
    }

    public function edit($id)
    {
        $siswa_kriteria = SiswaKriteria::with(['siswa', 'kriteria'])->findOrFail($id);
        $kriteria = Kriteria::get();
        // $sub_kriteria = SubKriteria::with(['siswa_kriteria.siswa'])->get();

        return view('edit.siswa_kriteria-edit', ['siswa_kriteria' => $siswa_kriteria, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $siswa_kriteria = SiswaKriteria::findOrFail($id);

        $rules = [
            'kriteria_id' => 'required',
            'siswa_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'siswa_id.required' => 'Siswa wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        $result = $siswa_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/siswa');
    }

    public function destroy($id)
    {
        $siswa_kriteria = SiswaKriteria::findOrFail($id);
        $result = $siswa_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/siswa');
    }
}
