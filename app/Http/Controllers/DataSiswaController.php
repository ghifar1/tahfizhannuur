<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataSiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('tipe', 'siswa')->where('kelas', Auth::user()->kelas)->get();
        return view('guru/guploadmurid',
        [
            'title' => 'Upload data siswa',
            'dataSiswa' => $siswa
        ]);
    }

    public function upload(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('siswa'));
        return redirect()->back();
    }
}
