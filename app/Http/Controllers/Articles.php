<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class Articles extends Controller
{
    //
    public function index()
    {
        return view("articles.list", [
            'articles' => Article::all(),
        ]);
    }

    public function create()
    {
        $category = Category::all();
        return view("articles.create", ['categories' => $category]);
    }

    public function store(Request $request)
    {
        $title = $request->post('title');
        $body = $request->post('body');
        $category_id = $request->post('category_id');
        $article = new Article();
        $article->image_url = "";
        if ($request->file("article_image") != null) {
            $image = $request->file("article_image");
            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(''), $path);
            $article->image_url = $path;
        }
        $article->title = $title;
        $article->article_body = $body;
        $article->category_id = $category_id;
        $article->save();
        return redirect("articles");
    }

    public function show($id)
    {
        $category = Category::all();
        $article = Article::where('id', $id)->get()->first();
        return view("articles.edit", ['article' => $article, 'categories' => $category]);
    }

    public function update(Request $request, $id)
    {
        $article = Article::where('id', $id)->get()->first();
        $article->title = $request->post("title");
        $article->article_body = $request->post("body");
        $article->category_id = $request->post("category_id");
        if ($request->file("article_image") != null) {
            $image = $request->file("article_image");
            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(''), $path);
            $article->image_url = $path;
        }
        $article->save();
        return redirect('articles/' . $id);
    }

}
