<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function index()
    {
        $total_admin = User::where(["level"=>1])->count();
        $total_author = User::where(["level"=>2])->count();
        $total_announcement = Announcement::count();
        return view('admin.index', [
            'total_admin' => $total_admin,
            'total_author' => $total_author,
            'total_announcement' => $total_announcement,
        ]);
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

    public function portfolio_index()
    {
        $data = Portfolio::all();
        return view('admin.portfolio', [
            "title" => "Portfolio",
            "level" => "Administrator",
            "data" => $data,
        ]);
    }

    public function portfolio_create()
    {
        return view("admin.portfolio_form", [
            "title" => "portfolio",
            "level" => "Administrator",
            "data" => null,
            "route" => [
                "name" => "portfolio.store",
                "params" => []
            ]
        ]);
    }

    public function portfolio_edit($id)
    {
        $row = Portfolio::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("admin.portfolio_form", [
                "title" => "Update portfolio",
                "level" => "Admin",
                "data" => $row->first(),
                "route" => [
                    "name" => "portfolio.update",
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
