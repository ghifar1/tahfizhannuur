<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index=>$row){
            if($index > 0)
            {
                $user = new User;
                $user->name = $row[0];
                $user->nisn = $row[1];
                $user->kelas = $row[2];
                $user->tipe = 'siswa';
                $user->password = Hash::make($row[1]);
                $user->save();
            }

        }
    }
}
