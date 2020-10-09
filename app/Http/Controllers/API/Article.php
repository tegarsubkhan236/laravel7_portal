<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article as ArticleModel;
use Illuminate\Http\Request;

class Article extends Controller
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
        $announcement = ArticleModel::orderBy("created_at",$sort)->paginate($req->limit);
        $announcement->getCollection()->transform(function ($value) {
            if (strlen($value->contents) > 10){
                $value->contents = substr($value->contents, 0, 7) . '...';
            }
            return $value;
        });
        return response()->json($announcement);

    }

    public function detail(Request $req)
    {
        $req->validate([
            "id"=>"required|exists:articles,id"
        ]);

        $detail = ArticleModel::where(["id"=>$req->id])->first();
        $detail->category;
        return response()->json($detail);

    }
}
