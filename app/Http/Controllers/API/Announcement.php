<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Announcement as AnnModel;
use Illuminate\Http\Request;

class Announcement extends Controller
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
        $announcement = AnnModel::orderBy("created_at",$sort)->paginate($req->limit);
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
           "id"=>"required|exists:announcements,id"
        ]);

        $detail = AnnModel::where(["id"=>$req->id])->first();

        return response()->json($detail);

    }
}
