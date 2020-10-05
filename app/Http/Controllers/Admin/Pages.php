<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function user_index()
    {
        $data = User::all();
        return view('admin.user', [
            "title" => "Data User",
            "level" => "Administrator",
            "data" => $data,
        ]);
    }

    public function user_create()
    {
        return view("admin.user_form", [
            "title" => "Tambah User",
            "data" => null,
            "route" => [
                "name" => "user.store",
                "params" => []
            ]
        ]);
    }

    public function announcement_index()
    {
        $data = Announcement::all();
        return view('admin.announcement', [
            "title" => "Announcement",
            "level" => "Administrator",
            "data" => $data,
        ]);
    }

    public function announcement_create()
    {
        return view("admin.announcement_form", [
            "title" => "Announcement",
            "level" => "Administrator",
            "data" => null,
            "route" => [
                "name" => "announcement.store",
                "params" => []
            ]
        ]);
    }

    public function announcement_edit($id)
    {
        $row = Announcement::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("admin.announcement_form", [
                "title" => "Update Announcement",
                "level" => "Admin",
                "data" => $row->first(),
                "route" => [
                    "name" => "announcement.update",
                    "params" => [
                        $id
                    ]
                ]
            ]);
        } else {
            return  back()->withErrors(["message" => "Data Tidak Ditemukan"]);
        }
    }
}
