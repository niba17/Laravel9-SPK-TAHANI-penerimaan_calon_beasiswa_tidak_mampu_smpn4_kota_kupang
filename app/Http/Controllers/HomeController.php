<?php

namespace App\Http\Controllers;

// use App\Models\Kecamatan;
use App\Models\Kelas;
// use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\SubKriteria;
use App\Models\Tingkat;
use App\Models\User;
use PHPUnit\Util\Type;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::all();
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();
        $sub_kriteria = SubKriteria::all();
        // $kecamatan = Kecamatan::all();
        // $kelurahan = Kelurahan::all();
        $tingkat = Tingkat::all();
        $kelas = Kelas::all();

        return view('home', ['akun' => $akun, 'siswa' => $siswa, 'kriteria' => $kriteria, 'tingkat' => $tingkat, 'kelas' => $kelas, 'sub_kriteria' => $sub_kriteria]);
    }
}