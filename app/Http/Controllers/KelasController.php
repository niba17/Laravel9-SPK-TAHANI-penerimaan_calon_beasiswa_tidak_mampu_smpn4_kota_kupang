<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['tingkat'])->get();

        session()->forget('errMessage');
        return view('kelas', ['kelas' => $kelas]);
    }

    public function create()
    {
        $tingkat = Tingkat::all();

        return view('add.kelas-add', ['tingkat' => $tingkat]);
    }

    public function validator_add(Request $request)
    {
        $rules = [];
        $messages = [];
        $rules['nama'] = 'max:50|required';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';

        $request->validate($rules, $messages);

        $kelas = Kelas::get();

        $valid = true;
        foreach ($kelas as $key => $value) {
            if ($request->nama == $value->nama && $request->tingkat_id == $value->tingkat_id) {
                $valid = false;
            }
        }

        if ($valid == true) {
            return $this->store($request);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'nama' => ['Kelas sudah ada!']
            ]);
            throw $error;
        }

    }

    public function store(Request $request)
    {

        $result = Kelas::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kelas berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kelas gagal ditambahkan!');
        }

        return redirect('/tingkat');
    }

    public function edit($id)
    {
        // $tingkat = Tingkat::all();
        $kelas = Kelas::with('tingkat')->findOrFail($id);
        // $kelurahanArr = [];
        // $kelurahanArr = $kelas;
        $tingkat = Tingkat::all();

        return view('edit.kelas-edit', ['kelas' => $kelas, 'tingkat' => $tingkat]);
    }

    public function validator_edit(Request $request, $id)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $kelas = Kelas::findOrFail($id);



        if ($kelas->nama != $request->nama) {
            $rules['nama'] = 'max:50|required';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Nama wajib diisi!';
        }

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        // if ($kelas->bobot != $request->bobot) {
        //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
        // }

        $kelas_all = Kelas::get();

        $valid = true;
        if ($kelas->nama != $request->nama) {
            foreach ($kelas_all as $key => $value) {
                if ($request->nama == $value->nama && $request->tingkat_id == $value->tingkat_id) {
                    $valid = false;
                }
            }
        }

        if ($kelas->tingkat_id != $request->tingkat_id) {
            foreach ($kelas_all as $key => $value) {
                if ($request->tingkat_id == $value->tingkat_id && $request->tingkat_id == $value->tingkat_id) {
                    $valid = false;
                }
            }
        }

        if ($valid == true) {
            return $this->update($arrayUp, $id);
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'nama' => ['Kelas sudah ada!']
            ]);
            throw $error;
        }

    }

    public function update(Request $request, $id)
    {

        $kelas = Kelas::findOrFail($id);

        $result = $kelas->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kelas berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kelas gagal diubah!');
        }

        return redirect('/tingkat');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $result = $kelas->delete();

        if ($result) {
            Session::flash('succMessage', 'Kelas berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kelas gagal dihapus!');
        }

        return redirect('/tingkat');
    }
}