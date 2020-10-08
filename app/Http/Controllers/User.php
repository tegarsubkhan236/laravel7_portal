<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class User extends Controller
{
    public function profile()
    {
        $id = session()->get("id");
        $find = ModelsUser::findOrFail($id);
        if ($find) {
            $data = [
                "level" => $find->level,
                "id" => $find->id,
                "nama" => $find->nama,
                "username" => $find->username,
                "password" => $find->password,
                "alamat" => $find->alamat,
                "no_hp" => $find->no_hp,
                "email" => $find->email,
            ];
        }
        return view('profile', [
            "data" => $data,
            "route" => [
                "name" => "profile.update",
                "params" => [
                    $id
                ]
            ]
        ]);
    }

    public function profile_update(Request $request)
    {
        $id =  $id = session()->get("id");
        $request->validate([
            "nama" => "required",
            "username" => "required",
            "password" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "email" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = ModelsUser::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }
}
