<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use App\Models\Gejala;
use PHPUnit\Util\Type;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PakarController extends Controller
{
    public function index(Type $var = null)
    {
        $penyakit = Penyakit::with(['pakar.gejala'])->get();
        // dd($pakar);
        session()->forget('errMessage');
        return view('pakar', ['penyakit' => $penyakit]);
    }

    public function create()
    {
        $gejala = Gejala::get();
        $penyakit = Penyakit::get();
        return view('add.pakar-add', ['gejala' => $gejala, 'penyakit' => $penyakit]);
    }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];

        $rules['gejala_id'] = 'required';
        $messages['gejala_id.required'] = 'Gejala wajib diisi!';

        $rules['penyakit_id'] = 'required';
        $messages['penyakit_id.required'] = 'Penyakit wajib diisi!';

        $rules['bobot'] = 'lte:1|gte:0.1|required';
        $messages['bobot.lte'] = 'Bobot tidak boleh lebih dari 1!';
        $messages['bobot.gte'] = 'Bobot tidak boleh kurang dari 0.1!';
        $messages['bobot.required'] = 'Bobot wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $result = Pakar::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Data pakar berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Data pakar gagal ditambahkan!');
        }

        return redirect('/pakar');
    }

    public function edit($id)
    {
        $pakar = Pakar::with(['gejala'])->findOrFail($id);
        $gejala = Gejala::with(['pakar'])->get();
        $penyakit = Penyakit::with(['pakar'])->get();
        return view('edit.pakar-edit', ['pakar' => $pakar, 'gejala' => $gejala, 'penyakit' => $penyakit]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $pakar = Pakar::findOrFail($id);

        if ($request->gejala_id != $pakar->gejala_id) {
            $rules['gejala_id'] = 'required';
            $messages['gejala_id.required'] = 'Gejala wajib diisi!';
        }

        if ($request->penyakit_id != $pakar->penyakit_id) {
            $rules['penyakit_id'] = 'required';
            $messages['penyakit_id.required'] = 'Penyakit wajib diisi!';
        }

        if ($request->bobot != $pakar->bobot) {
            $rules['bobot'] = 'lte:1|gte:0.1|required';
            $messages['bobot.lte'] = 'Bobot tidak boleh lebih dari 1!';
            $messages['bobot.gte'] = 'Bobot tidak boleh kurang dari 0.1!';
            $messages['bobot.required'] = 'Bobot wajib diisi!';
        }

        $request->validate($rules, $messages);
        $arrayUp = [];
        $arrayUp = $request;

        $result = $pakar->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Data pakar berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Data pakar gagal diubah!');
        }

        return redirect('/pakar');
    }

    public function destroy($id)
    {
        $pakar = Pakar::findOrFail($id);
        $result = $pakar->delete();

        if ($result) {
            Session::flash('succMessage', 'Data pakar berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Data pakar gagal dihapus!');
        }

        return redirect('/pakar');
    }

    public function request()
    {
        $pakar = ['pakar' => Pakar::with(['gejala', 'penyakit'])->get(), 'penyakit' => Penyakit::with(['pakar'])->get()];
        return response()->json([$pakar]);
    }
}