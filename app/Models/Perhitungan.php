<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\KriteriaSubKriteria;
use App\Models\Siswa;
use App\Models\SiswaKriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    public function fuzzy_tahani()
    {

        //Mencari derajat keanggotaan
        $siswa = Siswa::with(['siswa_kriteria.kriteria.kriteria_sub_kriteria.sub_kriteria'])->get();
        $kriteria = Kriteria::with(['siswa_kriteria.siswa', 'kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();
        $siswa_kriteria = SiswaKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();

        //membuat array awal
        $arr_siswa_kriteria = [];
        $i = 0;
        foreach ($siswa as $value_siswa) {

            $arr_siswa_kriteria[$i]['siswa'] = [
                'siswa_id' => $value_siswa->id,
                'siswa_nama' => $value_siswa->nama,
                'siswa_nis' => $value_siswa->nis,
            ];

            $j = 0;
            foreach ($value_siswa->siswa_kriteria as $value_kriteria) {

                $arr_siswa_kriteria[$i]['kriteria'][$j] = [
                    'kriteria_id' => $value_kriteria->kriteria->id,
                    'kriteria_nama' => $value_kriteria->kriteria->nama,
                    'kriteria_bobot' => $value_kriteria->bobot,
                ];

                $j++;
            }

            $i++;
        }

        //menghitung nilai kuartil tiap kriteria

        //mengurutkan bobot kriteria siswa
        $arr_kriteria_sort = [];
        $i = 0;
        foreach ($kriteria as $value_kriteria) {

            $j = 0;
            foreach ($siswa_kriteria as $value_siswa_kriteria) {

                if ($value_siswa_kriteria->kriteria_id == $value_kriteria->id) {

                    $arr_kriteria_sort[$i]['kriteria_id'] = $value_kriteria->id;
                    $arr_kriteria_sort[$i]['kriteria_nama'] = $value_kriteria->nama;
                    $arr_kriteria_sort[$i]['kriteria_bobot'][$j] = $value_siswa_kriteria->bobot;

                    $j++;
                }

            }

            sort($arr_kriteria_sort[$i]['kriteria_bobot']);

            $i++;
        }

        //menghitung dengan rumus kuartil
        $count = count($siswa);

        $Q1 = 0;
        $Q2 = 0;
        $Q3 = 0;

        if ($count % 2 == 1) {
            $count = $count - 1;

            $Q1 = 1 * ($count / count($kriteria));
            $Q1 = number_format((float) $Q1);

            $Q2 = 2 * ($count / count($kriteria));
            $Q2 = number_format((float) $Q2);

            $Q3 = 3 * ($count / count($kriteria));
            $Q3 = number_format((float) $Q3);
        } else {
            $Q1 = 1 * ($count / count($kriteria));
            $Q1 = number_format((float) $Q1) - 1;

            $Q2 = 2 * ($count / count($kriteria));
            $Q2 = number_format((float) $Q2 - 1);

            $Q3 = 3 * ($count / count($kriteria));
            $Q3 = number_format((float) $Q3 - 1);
        }

        // dd($arr_kriteria_sort);

        //menghitung derajat keanggotaan siswa
        $i = 0;
        foreach ($arr_siswa_kriteria as $value_siswa_kriteria) {

            $j = 0;
            foreach ($kriteria as $value_kriteria) {

                $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j] = [
                    'kriteria_id' => $value_kriteria->id,
                    'kriteria_nama' => $value_kriteria->nama,
                ];

                foreach ($value_siswa_kriteria['kriteria'] as $value_value_siswa_kriteria_kriteria) {
                    if ($value_value_siswa_kriteria_kriteria['kriteria_id'] == $value_kriteria->id) {
                        $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j] = [
                            'kriteria_id' => $value_value_siswa_kriteria_kriteria['kriteria_id'],
                            'kriteria_nama' => $value_value_siswa_kriteria_kriteria['kriteria_nama'],
                            'kriteria_bobot' => $value_value_siswa_kriteria_kriteria['kriteria_bobot'],
                        ];
                    }
                }

                $x = 0;
                foreach ($value_kriteria->kriteria_sub_kriteria as $value_kriteria_sub_kriteria) {

                    $bobot_derajat_keanggotaan = 0;
                    $terendah = 0;

                    foreach ($arr_kriteria_sort as $value_arr_kriteria_sort) {
                        if ($value_arr_kriteria_sort['kriteria_id'] == $value_kriteria_sub_kriteria->kriteria_id) {
                            $choosenQ1 = $value_arr_kriteria_sort['kriteria_bobot'][$Q1];
                            $choosenQ2 = $value_arr_kriteria_sort['kriteria_bobot'][$Q2];
                            $choosenQ3 = $value_arr_kriteria_sort['kriteria_bobot'][$Q3];
                        }
                    }

                    //sub kriteria rendah
                    if ($x == 0) {

                        if ($value_kriteria_sub_kriteria->range_awal == 0) {

                            foreach ($arr_kriteria_sort as $value_arr_kriteria_sort) {

                                if ($value_arr_kriteria_sort['kriteria_id'] == $value_kriteria_sub_kriteria->kriteria_id) {

                                    $value_kriteria_sub_kriteria->range_awal = $value_arr_kriteria_sort['kriteria_bobot'][0];

                                }

                            }

                        }

                        // kondisi pertama
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] <= $value_kriteria_sub_kriteria->range_awal) {

                            $bobot_derajat_keanggotaan = 1;

                        }

                        // kondisi kedua
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] > $value_kriteria_sub_kriteria->range_awal && $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] <= $value_kriteria_sub_kriteria->range_akhir) {

                            if ($value_kriteria_sub_kriteria->range_akhir - $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] == 0 && $value_kriteria_sub_kriteria->range_akhir - $value_kriteria_sub_kriteria->range_awal == 0) {
                                $bobot_derajat_keanggotaan = 0;
                            } else {
                                $bobot_derajat_keanggotaan = ($value_kriteria_sub_kriteria->range_akhir - $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot']) / ($value_kriteria_sub_kriteria->range_akhir - $value_kriteria_sub_kriteria->range_awal);
                            }

                        }

                        // kondisi ketiga
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] > $choosenQ2) {

                            $bobot_derajat_keanggotaan = 0;

                        }

                    }

                    //sub kriteria sedang
                    elseif ($x == 1) {



                        // kondisi pertama
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] < $value_kriteria_sub_kriteria->range_awal && $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] > $value_kriteria_sub_kriteria->range_akhir) {

                            $bobot_derajat_keanggotaan = 0;

                        }

                        // kondisi kedua
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] >= $value_kriteria_sub_kriteria->range_awal && $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] <= $choosenQ2) {

                            if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] - $value_kriteria_sub_kriteria->range_awal == 0 && $choosenQ2 - $value_kriteria_sub_kriteria->range_awal == 0) {
                                $bobot_derajat_keanggotaan = 0;
                            } else {
                                $bobot_derajat_keanggotaan = ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] - $value_kriteria_sub_kriteria->range_awal) / ($choosenQ2 - $value_kriteria_sub_kriteria->range_awal);
                            }


                        }

                        // kondisi ketiga
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] >= $choosenQ2 && $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] <= $value_kriteria_sub_kriteria->range_akhir) {

                            if ($value_kriteria_sub_kriteria->range_akhir - $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] == 0 && $value_kriteria_sub_kriteria->range_akhir - $choosenQ2 == 0) {
                                $bobot_derajat_keanggotaan = 0;
                            } else {
                                $bobot_derajat_keanggotaan = ($value_kriteria_sub_kriteria->range_akhir - $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot']) / ($value_kriteria_sub_kriteria->range_akhir - $choosenQ2);
                            }

                        }

                    }

                    //sub kriteria tinggi
                    elseif ($x == 2) {

                        if ($value_kriteria_sub_kriteria->range_akhir == null) {

                            foreach ($arr_kriteria_sort as $value_arr_kriteria_sort) {

                                if ($value_arr_kriteria_sort['kriteria_id'] == $value_kriteria_sub_kriteria->kriteria_id) {

                                    $value_kriteria_sub_kriteria->range_akhir = $value_arr_kriteria_sort['kriteria_bobot'][count($value_arr_kriteria_sort['kriteria_bobot']) - 1];

                                }

                            }
                        }

                        // kondisi pertama
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] > $value_kriteria_sub_kriteria->range_akhir) {
                            $bobot_derajat_keanggotaan = 1;

                        }

                        // kondisi kedua
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] >= $choosenQ2 && $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] <= $value_kriteria_sub_kriteria->range_akhir) {

                            if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] - $choosenQ2 == 0 && $value_kriteria_sub_kriteria->range_akhir - $choosenQ2 == 0) {
                                $bobot_derajat_keanggotaan = 0;
                            } else {
                                $bobot_derajat_keanggotaan = ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] - $choosenQ2) / ($value_kriteria_sub_kriteria->range_akhir - $choosenQ2);
                            }

                        }

                        // kondisi ketiga
                        if ($arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['kriteria_bobot'] < $choosenQ2) {

                            $bobot_derajat_keanggotaan = 0;

                        }

                    }

                    $arr_siswa_kriteria[$i]['derajat_keanggotaan'][$j]['sub_kriteria'][$x] = [
                        'sub_kriteria_id' => $value_kriteria_sub_kriteria->sub_kriteria->id,
                        'sub_kriteria_nama' => $value_kriteria_sub_kriteria->sub_kriteria->nama,
                        'sub_kriteria_range_awal' => $value_kriteria_sub_kriteria->range_awal,
                        'sub_kriteria_range_akhir' => $value_kriteria_sub_kriteria->range_akhir,
                        'bobot_derajat_keanggotaan' => $bobot_derajat_keanggotaan,
                    ];

                    $x++;
                }

                $j++;
            }

            $i++;
        }

        // dd($arr_siswa_kriteria);
        return $arr_siswa_kriteria;
    }

    // public function bubble_sort($arr, $key)
// {
//     $size = count($arr) - 1;
//     for ($i = 0; $i < $size; $i++) {
//         for ($j = 0; $j < $size - $i; $j++) {
//             $k = $j + 1;
//             if ($arr[$k][$key] > $arr[$j][$key]) {
//                 // Swap elements at indices: $j, $k
//                 list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
//             }
//         }
//     }

    //     return $arr;
// }

}