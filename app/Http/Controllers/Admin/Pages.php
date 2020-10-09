<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ImageGallery;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function index()
    {
        $total_admin = User::where(["level" => 1])->count();
        $total_author = User::where(["level" => 2])->count();
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

    public function image_gallery_index()
    {
        $data = ImageGallery::all();
        return view('admin.image_gallery', [
            "title" => "Image Gallery",
            "level" => "Administrator",
            "data" => $data,
        ]);
    }

    public function image_gallery_create()
    {
        return view("admin.image_gallery_form", [
            "title" => "New Image Gallery",
            "level" => "Administrator",
            "data" => null,
            "route" => [
                "name" => "image_gallery.store",
                "params" => []
            ]
        ]);
    }

    public function image_gallery_edit($id)
    {
        $row = ImageGallery::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("admin.image_gallery_form", [
                "title" => "Update Image Gallery",
                "level" => "Admin",
                "data" => $row->first(),
                "route" => [
                    "name" => "image_gallery.update",
                    "params" => [
                        $id
                    ]
                ]
            ]);
        } else {
            return  back()->withErrors(["message" => "Data Tidak Ditemukan"]);
        }
    }

    public function video_gallery_index()
    {
        $data = VideoGallery::all();
        return view('admin.video_gallery', [
            "title" => "Video Gallery",
            "level" => "Administrator",
            "data" => $data,
        ]);
    }

    public function video_gallery_create()
    {
        return view("admin.video_gallery_form", [
            "title" => "New Video",
            "level" => "Administrator",
            "data" => null,
            "route" => [
                "name" => "video_gallery.store",
                "params" => []
            ]
        ]);
    }

    public function video_gallery_edit($id)
    {
        $row = VideoGallery::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("admin.video_gallery_form", [
                "title" => "Update Video",
                "level" => "Admin",
                "data" => $row->first(),
                "route" => [
                    "name" => "video_gallery.update",
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
