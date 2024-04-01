<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\saveEvidence;
use App\Models\saveHipotesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $save_evidence = saveEvidence::all();
        $save_hipotesa = saveHipotesa::all();

        $save_evidence_fix = [];
        $i = 0;
        $j = 0;
        $x = 0;
        foreach ($save_evidence as $key => $value) {
            if ($i > 0) {
                if ($save_evidence[$i]->save_date_time == $save_evidence[$i - 1]->save_date_time) {
                    if ($i == 1) {
                        $save_evidence_fix[$x][$j] = $save_evidence[$i - 1];
                        $j++;
                    }
                    $save_evidence_fix[$x][$j] = $value;
                    $j++;
                } else {
                    $x++;
                    $j = 0;
                    $save_evidence_fix[$x][$j] = $save_evidence[$i];
                    $j++;
                }
            } else {
                $save_evidence_fix[$x][$j] = $value;
            }
            $i++;
        }

        $save_hipotesa_fix = [];
        $i = 0;
        $j = 0;
        $x = 0;
        foreach ($save_hipotesa as $key => $value) {
            if ($i > 0) {
                if ($save_hipotesa[$i]->save_date_time == $save_hipotesa[$i - 1]->save_date_time) {
                    if ($i == 1) {
                        $save_hipotesa_fix[$x][$j] = $save_hipotesa[$i - 1];
                        $j++;
                    }
                    $save_hipotesa_fix[$x][$j] = $value;
                    $j++;
                } else {
                    $x++;
                    $j = 0;
                    $save_hipotesa_fix[$x][$j] = $save_hipotesa[$i];
                    $j++;
                }
            } else {
                $save_evidence_fix[$x][$j] = $value;
            }
            $i++;
        }
        // dd($save_evidence_fix);

        return view('riwayat', ['save_evidence_fix' => $save_evidence_fix, 'save_hipotesa_fix' => $save_hipotesa_fix]);
    }

    public function detail($date)
    {
        // dd($date);
        $save_evidence = saveEvidence::all();
        $save_hipotesa = saveHipotesa::all();

        $save_evidence_fix = [];
        $i = 0;
        $j = 0;
        foreach ($save_evidence as $key => $value) {
            if ($value->save_date_time == $date) {
                $save_evidence_fix[$j] = $value;
                $j++;
            }
            $i++;
        }

        $save_hipotesa_fix = [];
        $i = 0;
        $j = 0;
        foreach ($save_hipotesa as $key => $value) {
            if ($value->save_date_time == $date) {
                $save_hipotesa_fix[$j] = $value;
                $j++;
            }
            $i++;
        }
        // dd($save_hipotesa_fix);

        return view('detail.riwayat-detail', ['save_evidence_fix' => $save_evidence_fix, 'save_hipotesa_fix' => $save_hipotesa_fix, 'date' => $date]);
    }

    public function destroy($date)
    {
        $date = urldecode($date);
        // dd($date);
        $result1 = saveEvidence::where('save_date_time', $date)->delete();
        $result2 = saveHipotesa::where('save_date_time', $date)->delete();
        // $result1 = $evidence->delete();
        // $result2 = $hipotesa->delete();

        if ($result1 && $result2) {
            Session::flash('succMessage', 'Riwayat berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Riwayat gagal dihapus!');
        }

        return redirect('/riwayat');
    }
}