<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function getSiswa($id)
    {
        $siswa = User::find($id);

        return response()->json($siswa);
    }

    public function editSiswa(Request $request)
    {
        $siswa = User::find($request->id);
        if(!$siswa) return redirect()->back();
        $siswa->name = $request->name;
        $siswa->nisn = $request->nisn;
        $siswa->password = Hash::make($request->nisn);
        $siswa->kelas = $request->kelas;
        $siswa->save();

        return redirect()->back()->with(['status' => true]);

    }
}
