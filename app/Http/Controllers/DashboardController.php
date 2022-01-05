<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->tipe == "guru")
        {
            $siswa = User::where('tipe', 'siswa')->where('kelas', Auth::user()->kelas)->get();
            $surat = Http::get('https://al-quran-8d642.firebaseio.com/data.json?print=pretty')->json();

            return view('guru/gdashboard', [
                'title' => 'Dashboard',
                'dataSiswa' => $siswa,
                'surat' => $surat
            ]);
        } else {
            $hafalan = Hafalan::where('user_id', Auth::id())->get()->groupBy('kelas');
            return view('siswa/sdashboard', [
                'title' => 'Rekap Hafalan',
                'hafalan' => $hafalan
            ]);
        }


    }


}
