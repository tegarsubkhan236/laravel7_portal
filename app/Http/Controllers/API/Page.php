<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page as PageModel;
use Illuminate\Http\Request;

class Page extends Controller
{
    public function detail(Request $req)
    {
        $req->validate([
            "id"=>"required|exists:pages,id"
        ]);

        $detail = PageModel::where(["id"=>$req->id])->first();
        return response()->json($detail);

    }
}
