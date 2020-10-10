<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\ImageGallery;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function page_store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
            "is_commented" => "required",
        ]);
        $data = $request->except(['_token']);

        $data["slug"] = Str::slug($data["title"], "-");;
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");

        $store = Page::create($data);

        if ($store) {
            return redirect(route('page'))->with(["message" => "Data has been stored successfully !"]);
        } else {
            return redirect(route('page'))->with(["message" => "Data failed to store !"]);
        }
    }

    public function page_update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
            "is_commented" => "required",
        ]);
        $data = $request->all();
        $data["slug"] = Str::slug($data["title"], "-");
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = Page::where(["id" => $id])->update($data);
        if ($ins) {
            return redirect(route('page'))->with(["message" => "Data has been updated successfully !"]);
        } else {
            return redirect(route('page'))->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function page_delete(Request $request)
    {
        Page::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }

    public function menu_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "link" => "nullable",
            "is_blank" => "required",
            "page_id" => "nullable",
            "is_visibility" => "required",
            "position" => "required",
            "parent_id" => "nullable",
        ]);
        $data = $request->except(['_token']);
        $store = Menu::create($data);

        if ($store) {
            return redirect(route('menu'))->with(["message" => "Data has been stored successfully !"]);
        } else {
            return redirect(route('menu'))->with(["message" => "Data failed to store !"]);
        }
    }

    public function menu_update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "link" => "nullable",
            "is_blank" => "required",
            "is_visibility" => "required",
            "position" => "required",
            "page_id" => "nullable",
            "parent_id" => "nullable",
        ]);
        $data = $request->all();
        unset($data["_token"]);
        $ins = Menu::where(["id" => $id])->update($data);
        if ($ins) {
            return redirect(route('menu'))->with(["message" => "Data has been updated successfully !"]);
        } else {
            return redirect(route('menu'))->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function menu_delete(Request $request)
    {
        Menu::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }
}
