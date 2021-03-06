<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $hafalan->created_by = Auth::id();
        $hafalan->save();

        return redirect()->back()->with(['status' => true]);
    }

    public function update(Request $request)
    {
        $hafalan = Hafalan::find($request->hafalan_id);
        $hafalan->surat = $request->surat;
        $hafalan->ayat = $request->ayat;
        $hafalan->isLanjut = $request->islanjut;
        $hafalan->status = $request->status;
        $hafalan->save();

        return redirect()->back()->with(['status' => true]);
    }

    public function delete(Request $request)
    {
        $hafalan = Hafalan::find($request->hafalan_id);
        $hafalan->delete();
        return redirect()->back()->with(['status' => true]);
    }

    public function showAllData()
    {
        $hafalan = Hafalan::where('kelas', Auth::user()->kelas)->where('created_by', Auth::id())->get()->sortBy('tanggal');
        $surat = Http::get('https://al-quran-8d642.firebaseio.com/data.json?print=pretty')->json();

        return view('guru/semuadatahafalan', [
            'title' => 'Data Hafalan',
            'hafalan' => $hafalan,
            'surat' => $surat
        ]);
    }
}
