<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Ujian;
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

    public function ujian()
    {
        $siswa = User::where('tipe', 'siswa')->where('kelas', Auth::user()->kelas)->get();

        $juz = Http::get('https://raw.githubusercontent.com/sutanlab/quran-api/master/data/juz.json')->json();

        if(Auth::user()->tipe == "guru")
        {
            $ujian = Ujian::all();
            return view('guru/gujian', [
                'title' => 'Data Ujian',
                'juz' => $juz,
                'dataSiswa' => $siswa,
                'ujian' => $ujian
            ]);
        } else {
            $ujian = Ujian::where('user_id', Auth::id())->get();
            return view('siswa/sujian', [
                'title' => 'Ujian',
                'juz' => $juz,
                'ujian' => $ujian
            ]);
        }
    }


}
