<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use App\Models\Gejala;
use PHPUnit\Util\Type;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GejalaController extends Controller
{
    public function index(Type $var = null)
    {
        $gejala = Gejala::get();

        session()->forget('errMessage');
        return view('gejala', ['gejala' => $gejala]);
    }

    public function create()
    {
        return view('add.gejala-add');
    }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];

        $rules['kode'] = 'unique:gejala|max:100|required';
        $messages['kode.unique'] = 'Kode gejala sudah ada!';
        $messages['kode.max'] = 'Kode gejala tidak boleh lebih dari :max karakter!';
        $messages['kode.required'] = 'Kode gejala wajib diisi!';

        $rules['nama'] = 'unique:gejala|max:500|required';
        $messages['nama.unique'] = 'Gejala sudah ada!';
        $messages['nama.max'] = 'Gejala tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Gejala wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $result = Gejala::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Gejala berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Gejala gagal ditambahkan!');
        }

        return redirect('/gejala');
    }

    public function edit($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('edit.gejala-edit', ['gejala' => $gejala]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $gejala = Gejala::findOrFail($id);

        if ($request->kdoe != $gejala->kdoe) {
            $rules['kode'] = 'unique:gejala|max:100|required';
            $messages['kode.unique'] = 'Kode gejala sudah ada!';
            $messages['kode.max'] = 'Kode gejala tidak boleh lebih dari :max karakter!';
            $messages['kode.required'] = 'Kode gejala wajib diisi!';

        }

        if ($request->nama != $gejala->nama) {
            $rules['nama'] = 'unique:users|max:500|required';
            $messages['nama.unique'] = 'Gejala Sudah ada!';
            $messages['nama.required'] = 'Gejala wajib Diisi!';
            $messages['nama.max'] = 'Gejala tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);
        $arrayUp = [];
        $arrayUp = $request;

        $result = $gejala->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Gejala berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Gejala gagal diubah!');
        }

        return redirect('/gejala');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $result = $gejala->delete();

        if ($result) {
            Session::flash('succMessage', 'Gejala berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Gejala gagal dihapus!');
        }

        return redirect('/gejala');
    }

    public function request()
    {
        $gejala = ['gejala' => Gejala::with(['pakar'])->get(), 'pakar' => Pakar::with(['gejala'])->get()];
        return response()->json([$gejala]);
    }
}