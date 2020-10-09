<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu as MenuModel;
use Illuminate\Http\Request;

class Menu extends Controller
{
    public function index(Request $req)
    {
        $req->validate([
            "limit"=>"required|numeric|min:0",
            "sort"=>"required|numeric|min:1",
            "is_parent"=>"required|numeric|min:0",
        ]);
        $sort = "desc";
        if ($req->sort == 2){
            $sort = "asc";
        }
        $is_parent = false;
        if ($req->is_parent){
            $is_parent = true;
        }
        if ($is_parent){
            $announcement = MenuModel::orderBy("position",$sort)->whereRaw("parent_id IS NULL")->paginate($req->limit);
        }else{
            $announcement = MenuModel::orderBy("position",$sort)->whereRaw("parent_id IS NOT NULL")->paginate($req->limit);

        }
        $announcement->getCollection()->transform(function ($value) {
            $redirect = $value->link;
            if ($value->page_id === NULL){
                unset($value->page_id);
            }else{
                $redirect = url("page/".$value->page()->first()->slug);
                unset($value->link);
            }
            if ($redirect === null){
                $redirect = "#";
            }
            $value->redirect = $redirect;
            $value->childs = [];
            if ($value->menus()->count() > 0){
                $value->childs = $value->menus()->get();
            }
            return $value;
        });
        return response()->json($announcement);

    }
}
