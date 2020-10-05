<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login_page()
    {
        return view("login", [
            "title" => "Login Page",
        ]);
    }

    public function register_page()
    {
        return view("register", [
            "title" => "Register Page",
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $find = User::where([
            "username" => $request->username,
            "password" => $request->password,
        ]);
        if ($find->count() > 0) {
            session([
                "level" => $find->first()->level,
                "id" => $find->first()->id,
                "nama" => $find->first()->nama,
                "created_at" => $find->first()->created_at,
            ]);
            if ($find->first()->level == 0) {
                $pages = "netizen";
            } elseif ($find->first()->level == 1) {
                $pages = "administrator";
            } elseif ($find->first()->level == 2) {
                $pages = "author";
            }
            return redirect("/" . $pages)->with(["message" => "Login Successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data not found !"]);
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
