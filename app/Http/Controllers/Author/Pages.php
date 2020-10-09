<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function index()
    {
        $total_category = DB::table('categories')->count();
        $total_article = DB::table('articles')->count();
        return view('author.index', [
            'total_category' => $total_category,
            'total_article' => $total_article,
        ]);
    }

    public function category_index()
    {
        $data = Category::all();
        return view('author.category', [
            "title" => "Data Category",
            "level" => "Author",
            "data" => $data,
        ]);
    }

    public function category_create()
    {
        return view("author.category_form", [
<<<<<<< HEAD
            "title" => "Tambah Category",
=======
            "title" => "Tambah Author",
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
            "level" => "Author",
            "data" => null,
            "route" => [
                "name" => "category.store",
                "params" => []
            ]
        ]);
    }

    public function category_edit($id)
    {
        $row = Category::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("author.category_form", [
                "title" => "Update Kategori",
                "level" => "Author",
                "data" => $row->first(),
                "route" => [
                    "name" => "category.update",
                    "params" => [
                        $id
                    ]
                ]
            ]);
        } else {
            return  back()->withErrors(["message" => "Data Tidak Ditemukan"]);
        }
    }

    public function article_index()
    {
        $data = Article::all();
        return view('author.article', [
            "title" => "Data Article",
            "level" => "Author",
            "data" => $data,
        ]);
    }

    public function article_create()
    {
        $data = Category::all();
        return view("author.article_form", [
            "title" => "Tambah Author",
            "level" => "Author",
            "category" => $data,
            "route" => [
                "name" => "article.store",
                "params" => []
            ]
        ]);
    }

    public function article_edit($id)
    {
        $category = Category::all();
        $row = Article::where(["id" => $id]);
        if ($row->count() > 0) {
            return view("author.article_form", [
                "title" => "Update Kategori",
                "level" => "Author",
                "data" => $row->first(),
                "category" => $category,
                "route" => [
                    "name" => "article.update",
                    "params" => [
                        $id
                    ]
                ]
            ]);
        } else {
            return  back()->withErrors(["message" => "Data Tidak Ditemukan"]);
        }
    }
}
