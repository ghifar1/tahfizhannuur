<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function save(Request $request)
    {
        $user = User::find($request->siswa_id);

        $ujian = new Ujian();
        $ujian->user_id = $user->id;
        $ujian->juz = $request->juz;
        $ujian->isLulus = $request->isLulus;
        $ujian->tanggal = $request->tanggal;
        $ujian->kelas = $user->kelas;
        $ujian->penguji = $request->penguji;
        $ujian->save();

        return redirect()->back()->with(['status' => true]);
    }
}
