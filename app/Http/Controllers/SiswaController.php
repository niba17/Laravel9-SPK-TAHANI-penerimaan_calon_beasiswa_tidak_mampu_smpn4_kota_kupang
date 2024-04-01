<?php

namespace App\Http\Controllers;

// use App\Models\Kecamatan;
use App\Models\Kelas;
// use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Type;

class SiswaController extends Controller
{
    public function index(Type $var = null)
    {
        $siswa = Siswa::with(['siswa_kriteria.kriteria'])->get();
        // $siswa_sub_kriteria = SiswaSubKriteria::with(['siswa_sub_kriteria.sub_kriteria'])->get();
        $kriteria = Kriteria::get();
        // dd($siswa);
        // session()->forget('errMessage');
        return view('siswa', ['siswa' => $siswa, 'kriteria' => $kriteria]);
    }

    public function create()
    {
        // $kecamatan = Kecamatan::all();
        // $kelurahan = Kelurahan::all();
        $tingkat = Tingkat::all();
        $kelas = Kelas::all();

        return view('add.siswa-add', ['tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:siswa|max:50|required';
        $messages['nama.unique'] = 'Nama siswa sudah ada!';
        $messages['nama.max'] = 'Nama siswa tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama siswa wajib diisi!';

        $rules['nis'] = 'unique:siswa|max:50|required';
        $messages['nis.unique'] = 'NIM sudah ada!';
        $messages['nis.max'] = 'NIM tidak boleh lebih dari :max karakter!';
        $messages['nis.required'] = 'NIM wajib diisi!';

        $rules['jk'] = 'max:50|required';
        $messages['jk.required'] = 'Jenis Kelamin wajib dipilih!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal wajib dipilih!';

        // $rules['bln_lahir'] = 'required';
        // $messages['bln_lahir.required'] = 'Bulan wajib dipilih!';

        // $rules['thn_lahir'] = 'required';
        // $messages['thn_lahir.required'] = 'Tahun wajib dipilih!';

        // $rules['jurusan_id'] = 'max:50|required';
        // $messages['jurusan_id.required'] = 'jurusan wajib dipilih!';

        // $rules['kecamatan_id'] = 'required';
        // $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        // $rules['kelurahan_id'] = 'required';
        // $messages['kelurahan_id.required'] = 'Kelurahan wajib dipilih!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $result = Siswa::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Siswa berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Siswa gagal ditambahkan!');
        }

        return redirect('/siswa');
    }

    public function edit($id)
    {
        // dd($id);
        $siswa = Siswa::findOrFail($id);
        // $kecamatan = Kecamatan::with('kelurahan')->get();
        // $kelurahan = Kelurahan::all();
        $tingkat = Tingkat::all();
        $kelas = Kelas::all();
        $jk = ['Laki - Laki', 'Perempuan'];

        return view('edit.siswa-edit', ['siswa' => $siswa, 'jk' => $jk, 'tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $rules = [];
        $messages = [];
        $siswa = Siswa::findOrFail($id);
        // dd($request->tgl_lahir !== $siswa->tgl_lahir);
        // dd($request->nim != $siswa->nim);
        if ($request->nama != $siswa->nama) {
            $rules['nama'] = 'unique:siswa|max:50|required';
            $messages['nama.unique'] = 'Nama Siswa Sudah ada!';
            $messages['nama.required'] = 'Siswa wajib Diisi!';
            $messages['nama.max'] = 'Nama Siswa tidak boleh lebih dari :max karakter!';
        }

        if ($request->nis != $siswa->nis) {
            $rules['nis'] = 'unique:siswa|required';
            $messages['nis.unique'] = 'NIM Sudah ada!';
            $messages['nis.required'] = 'NIM wajib Diisi!';
        }

        if ($request->jk != $siswa->jk) {
            $rules['jk'] = 'required';
            $messages['jk.required'] = 'Jenis kelamin wajib diisi!';
        }

        if ($request->tgl_lahir != $siswa->tgl_lahir) {
            $rules['tgl_lahir'] = 'required';
            $messages['tgl_lahir.required'] = 'Tanggal wajib dipilih!';
        }

        // if ($request->bln_lahir != $siswa->bln_lahir) {
        //     $rules['bln_lahir'] = 'required';
        //     $messages['bln_lahir.required'] = 'Bulan wajib dipilih!';
        // }

        // if ($request->thn_lahir != $siswa->thn_lahir) {
        //     $rules['thn_lahir'] = 'required';
        //     $messages['thn_lahir.required'] = 'Tahun wajib dipilih!';
        // }

        // if ($request->jurusan_id != $siswa->jurusan_id) {
        //     $rules['jurusan_id'] = 'required';
        //     $messages['jurusan_id.required'] = 'Jurusan wajib dipilih!';
        // }

        // if ($request->kecamatan_id != $siswa->kecamatan_id) {
        //     $rules['kecamatan_id'] = 'required';
        //     $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';
        // }

        // if ($request->kelurahan_id != $siswa->kelurahan_id) {
        //     $rules['kelurahan_id'] = 'required';
        //     $messages['kelurahan_id.required'] = 'Kelurahan wajib diisi!';
        // }

        // dd($messages);
        $request->validate($rules, $messages);

        $result = $siswa->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Siswa berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Siswa gagal diubah!');
        }

        return redirect('/siswa');
    }

    public function destroy($id)
    {
        $kecamatan = Siswa::findOrFail($id);
        $result = $kecamatan->delete();

        if ($result) {
            Session::flash('succMessage', 'Siswa berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Siswa gagal dihapus!');
        }

        return redirect('/siswa');
    }
}