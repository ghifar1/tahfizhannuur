<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RahasiaController extends Controller
{
    public function index($password)
    {
        if($password !== "wedusgembel")
        {
            return redirect('/');
        }
        return view('rahasia/index');
    }

    public function save(Request $request, $password)
    {
        if($password !== "wedusgembel")
        {
            return redirect('/');
        }

        $user = User::where('nisn', $request->username)->first();
        if(!$user)
        {
            $user = new User();
        }

        $user->name = $request->name;
        $user->nisn = $request->username;
        $user->password = Hash::make($request->password);
        $user->kelas = $request->kelas;
        $user->tipe = 'guru';
        $user->save();
        return redirect('/');
    }
}
