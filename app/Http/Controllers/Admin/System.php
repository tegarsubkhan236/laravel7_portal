<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Portfolio;
use App\Models\PortfolioDetail;
use App\Models\User;
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

    public function portfolio_store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "desc" => "required",
        ]);
        $images = [];
        if ($request->has("image")) {
            foreach ($request->file("image") as $index => $item) {
                $path = $item->store("public/portfolios");
                $images[] = $path;
            }
        } else {
            return response()->json(["code" => 500]);
        }
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
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function portfolio_update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = Portfolio::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function portfolio_delete(Request $request)
    {
        Portfolio::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }
}
