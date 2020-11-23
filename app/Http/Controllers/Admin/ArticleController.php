<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function show(Article $article)
    {
        return response()->json([
            'data' => $article
        ], 200);
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $path = $request->file('image')->store('articles_images');
        $article->image = $path;

        if ($article->save()){
            return response()->json([
                'data' => $article
            ], 201);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again ! !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->category_id = $request->category_id;

        $oldPath = $article->image;
        if ($request->hasFile('image')){
            $request->validate([
                'image'   =>  'image|mimes:jpg,png,jpeg',
            ]);
            $path = $request->file('image')->store('articles_images');
            $article->image = $path;

            Storage::delete($oldPath);
        }

        if ($article->save()){
            return response()->json([
                'data' => $article
            ], 200);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function destroy(Article $article)
    {
        if($article->delete()){
            Storage::delete($article->image);
            return response()->json([
                'message'   =>  'Article deleted successfully !',
                'status_code'   =>  204
            ], 204);
        }else{
            return response()->json([
                'message'   =>  'Some errors occured. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->json([
            'data' => $categories
        ], 200);
    }

    public function getArticleByCategory($id)
    {
        $articles = Article::where('category_id', $id)->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getLatestArticle() {
        $articles = Article::orderBy('id', 'desc')->take(3)->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getRandomArticle() {
        $articles = Article::all()->random(3);
        return response()->json([
            'data' => $articles
        ], 200);
    }
}
