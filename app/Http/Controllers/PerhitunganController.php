<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerhitunganController extends Controller
{
    protected $perhitungan;
    public function __construct()
    {
        $this->perhitungan = new Perhitungan();
    }

    public function derajat_keanggotaan()
    {
        $siswa = Siswa::with(['siswa_kriteria.kriteria.kriteria_sub_kriteria.sub_kriteria'])->get();
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();

        $valid = true;
        $message = '';

        if (count($kriteria) < 1) {
            $valid == false;
            $message = 'Kriteria tidak ada!';
        }

        if (count($sub_kriteria) < 1) {
            $valid == false;
            $message = 'Sub Kriteria tidak ada!';
        }

        if (count($siswa) < 1) {
            $valid == false;
            $message = 'Siswa tidak ada!';
        }

        $i = 0;
        foreach ($siswa->all() as $value_siswa) {
            $i = 0;
            foreach ($value_siswa->siswa_kriteria as $value_siswa_kriteria) {
                if (isset($value_siswa_kriteria->kriteria)) {
                    $i++;
                }
            }
            if ($i !== count($kriteria)) {
                $valid = false;
                $message = 'Lengkapi Kriteria Siswa terlebih dahulu!';
            }
        }

        if ($valid == false) {
            Session::flash('errMessage', $message);

            return redirect('/home');
        } else {
            $fuzzy_tahani = $this->perhitungan->fuzzy_tahani();
            $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();

            return view('perhitungan.perhitungan-derajat_keanggotaan', ['fuzzy_tahani' => $fuzzy_tahani, 'kriteria' => $kriteria]);
        }
    }

    public function query_penentuan(Request $request)
    {
        $fuzzy_tahani = $this->perhitungan->fuzzy_tahani();
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        // dd(count($kriteria));
        $condition = false;
        if (count($request->all()) > 0) {
            $condition = true;
        }
        // dd($fuzzy_tahani);
        if ($request !== null) {
            return view('perhitungan.perhitungan-query_penentuan', ['fuzzy_tahani' => $fuzzy_tahani, 'kriteria' => $kriteria, 'condition' => $condition, 'request' => $request]);
        } else {
            return view('perhitungan.perhitungan-query_penentuan', ['fuzzy_tahani' => $fuzzy_tahani, 'kriteria' => $kriteria, 'condition' => $condition]);
        }


    }

}