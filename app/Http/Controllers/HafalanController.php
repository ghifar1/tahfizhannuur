<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HafalanController extends Controller
{
    public function simpanHafalan(Request $request)
    {
        $user = User::find($request->siswa_id);

        $hafalan = new Hafalan();
        $hafalan->user_id = $user->id;
        $hafalan->surat = $request->surat;
        $hafalan->ayat = $request->ayat;
        $hafalan->isLanjut = $request->isLanjut;
        $hafalan->status = $request->status;
        $hafalan->tanggal = $request->tanggal;
        $hafalan->kelas = $user->kelas;
        $hafalan->save();

        return redirect()->back();
    }

    public function showAllData()
    {
        $hafalan = Hafalan::where('kelas', Auth::user()->kelas)->get()->sortBy('tanggal');

        return view('guru/semuadatahafalan', [
            'title' => 'Data Hafalan',
            'hafalan' => $hafalan
        ]);
    }
}
