<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->nisn = $request->nisn;
        $user->password = Hash::make($request->password);
        $user->tipe = 'guru';
        $user->save();

        return response()->json("OK");
    }
}
