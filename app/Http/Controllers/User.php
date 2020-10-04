<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    public function profile($id)
    {
        $find = ModelsUser::findOrFail($id);
        if ($find) {
            $data = [
                "level" => $find->level,
                "id" => $find->id,
                "nama" => $find->nama,
                "alamat" => $find->alamat,
                "no_hp" => $find->no_hp,
                "email" => $find->email,
            ];
        }
        return view('profile', compact('data'));
    }
}
