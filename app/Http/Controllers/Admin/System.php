<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
<<<<<<< HEAD
use App\Models\ImageGallery;
use App\Models\Portfolio;
use App\Models\PortfolioDetail;
use App\Models\User;
use App\Models\VideoGallery;
=======
use App\Models\Portfolio;
use App\Models\PortfolioDetail;
use App\Models\User;
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
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

<<<<<<< HEAD
    public function image_gallery_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "image" => "required",
=======
    public function portfolio_store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "desc" => "required",
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
        ]);
        $images = [];
        if ($request->has("image")) {
            foreach ($request->file("image") as $index => $item) {
<<<<<<< HEAD
                $name = $item->getClientOriginalName();
                $path = $item->store("public/image_galleries");
=======
                $path = $item->store("public/portfolios");
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                $images[] = $path;
            }
        } else {
            return response()->json(["code" => 500]);
        }
<<<<<<< HEAD
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
=======
        $data = $request->except(['_token', 'video', 'image']);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");

        $store = Portfolio::create($data);

        if ($store) {
            $id = $store->id;
            foreach ($images as $index => $image) {
                PortfolioDetail::create([
                    "image" => $image,
                    "video" => $request->video,
                    "portfolio_id" => $id
                ]);
            }
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

<<<<<<< HEAD
    public function video_gallery_update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "desc" => "required",
            "url" => "required",
            "type" => "required",
=======
    public function portfolio_update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
<<<<<<< HEAD
        $ins = VideoGallery::where(["id" => $id])->update($data);
=======
        $ins = Portfolio::where(["id" => $id])->update($data);
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

<<<<<<< HEAD
    public function video_gallery_delete(Request $request)
    {
        VideoGallery::find($request->id)->delete();
=======
    public function portfolio_delete(Request $request)
    {
        Portfolio::find($request->id)->delete();
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }
}
