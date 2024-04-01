<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use PHPUnit\Util\Type;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenyakitController extends Controller
{
    public function index(Type $var = null)
    {
        $penyakit = Penyakit::get();

        session()->forget('errMessage');
        return view('penyakit', ['penyakit' => $penyakit]);
    }

    public function create()
    {
        return view('add.penyakit-add');
    }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];

        $rules['kode'] = 'unique:penyakit|max:100|required';
        $messages['kode.unique'] = 'Kode penyakit sudah ada!';
        $messages['kode.max'] = 'Kode penyakit tidak boleh lebih dari :max karakter!';
        $messages['kode.required'] = 'Kode penyakit wajib diisi!';

        $rules['nama'] = 'unique:penyakit|max:500|required';
        $messages['nama.unique'] = 'Penyakit sudah ada!';
        $messages['nama.max'] = 'Penyakit tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Penyakit wajib diisi!';

        $rules['bobot'] = 'max:100|lte:1|gte:0.1|required';
        $messages['bobot.max'] = 'Bobot penyakit tidak boleh lebih dari :max karakter!';
        $messages['bobot.lte'] = 'Bobot penyakit tidak boleh lebih dari 1!';
        $messages['bobot.gte'] = 'Bobot penyakit herus lebih dari 0!';
        $messages['bobot.required'] = 'Bobot penyakit wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $result = Penyakit::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Penyakit berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Penyakit gagal ditambahkan!');
        }

        return redirect('/penyakit');
    }

    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return view('edit.penyakit-edit', ['penyakit' => $penyakit]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $penyakit = Penyakit::findOrFail($id);

        if ($request->kode != $penyakit->kode) {
            $rules['kode'] = 'unique:penyakit|max:100|required';
            $messages['kode.unique'] = 'Kode penyakit sudah ada!';
            $messages['kode.max'] = 'Kode penyakit tidak boleh lebih dari :max karakter!';
            $messages['kode.required'] = 'Kode penyakit wajib diisi!';
        }

        if ($request->nama != $penyakit->nama) {
            $rules['nama'] = 'unique:users|max:500|required';
            $messages['nama.unique'] = 'Username Sudah ada!';
            $messages['nama.required'] = 'Username wajib Diisi!';
            $messages['nama.max'] = 'Username tidak boleh lebih dari :max karakter!';
        }

        if ($request->bobot != $penyakit->bobot) {
            $rules['bobot'] = 'max:100|lte:1|gte:0.1|required';
            $messages['bobot.max'] = 'Bobot penyakit tidak boleh lebih dari :max karakter!';
            $messages['bobot.lte'] = 'Bobot penyakit tidak boleh lebih dari 1!';
            $messages['bobot.gte'] = 'Bobot penyakit herus lebih dari 0!';
            $messages['bobot.required'] = 'Bobot penyakit wajib diisi!';
        }

        $request->validate($rules, $messages);
        $arrayUp = [];
        $arrayUp = $request;

        $result = $penyakit->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Penyakit berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Penyakit gagal diubah!');
        }

        return redirect('/penyakit');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $result = $penyakit->delete();

        if ($result) {
            Session::flash('succMessage', 'Penyakit berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Penyakit gagal dihapus!');
        }

        return redirect('/penyakit');
    }

    public function request()
    {
        $penyakit = ['penyakit' => Penyakit::with(['pakar'])->get(), 'pakar' => Pakar::with(['penyakit'])->get()];
        return response()->json([$penyakit]);
    }
}