<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class System extends Controller
{
    public function category_store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        $data = $request->except(['_token']);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");
        $store = Category::insert($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function category_update(Request $req, $id)
    {
        $req->validate([
            "name" => "required"
        ]);
        $data = $req->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = Category::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function category_delete(Request $request)
    {
        Category::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }

    public function article_store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);
        $data = $request->except(['_token']);
        $data["created_at"] = date("Y-m-d");
        $data["updated_at"] = date("Y-m-d");
        $store = Article::insert($data);

        if ($store) {
            return back()->with(["message" => "Data has been stored successfully !"]);
        } else {
            return back()->with(["message" => "Data failed to store !"]);
        }
    }

    public function article_update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "contents" => "required",
        ]);
        $data = $request->all();
        $data["updated_at"] = date("Y-m-d");
        unset($data["_token"]);
        $ins = Article::where(["id" => $id])->update($data);
        if ($ins) {
            return back()->with(["message" => "Data has been updated successfully !"]);
        } else {
            return back()->withErrors(["message" => "Data failed to update !"]);
        }
    }

    public function article_delete(Request $request)
    {
        Article::find($request->id)->delete();
        return back()->with(["message" => "Data has been deleted successfully !"]);
    }
}
