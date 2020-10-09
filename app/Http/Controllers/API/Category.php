<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category as CategoryModel;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function index(Request $req)
    {
        $req->validate([
            "limit"=>"required|numeric|min:0",
            "sort"=>"required|numeric|min:1"
        ]);
        $sort = "desc";
        if ($req->sort == 2){
            $sort = "asc";
        }
        $announcement = CategoryModel::orderBy("created_at",$sort)->paginate($req->limit);
        $announcement->getCollection()->transform(function ($value) {
            $value->artice_count = $value->articles()->count();
            return $value;
        });
        return response()->json($announcement);

    }

    public function detail(Request $req)
    {
        $req->validate([
            "id"=>"required|exists:categories,id"
        ]);

        $detail = CategoryModel::where(["id"=>$req->id])->first();
        $detail->artice_count = $detail->articles()->count();
        return response()->json($detail);

    }
}
