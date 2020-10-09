<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ImageGallery;
use App\Models\User;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class System extends Controller
{
    public function user_store(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "username" => "required",
            "email" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "password" => "required",
            "level" => "required",
        ]);
        $data = $request->except(['_token']);
        $data["created_at"] = date("Y-m-d");
        $store = User::insert($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function user_delete(Request $request)
    {
        User::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }

    public function announcement_store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);
        $data = $request->except(['_token']);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");
        $store = Announcement::insert($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function announcement_update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = Announcement::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function announcement_delete(Request $request)
    {
        Announcement::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }

    public function image_gallery_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "image" => "required",
        ]);
        $images = [];
        if ($request->has("image")) {
            foreach ($request->file("image") as $index => $item) {
                $name = $item->getClientOriginalName();
                $path = $item->store("public/image_galleries");
                $images[] = $path;
            }
        } else {
            return response()->json(["code" => 500]);
        }
        $data = $request->except(['_token']);
        $data['image'] = implode("|", $images);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");

        $store = ImageGallery::create($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function image_gallery_update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = ImageGallery::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function image_gallery_delete(Request $request)
    {
        ImageGallery::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }

    public function video_gallery_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "url" => "required",
            "type" => "required",
        ]);
        $data = $request->except(['_token']);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");

        $store = VideoGallery::create($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function video_gallery_update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "url" => "required",
            "type" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = VideoGallery::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function video_gallery_delete(Request $request)
    {
        VideoGallery::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }
}
