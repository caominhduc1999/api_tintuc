<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function show(Article $article)
    {
        $article->views += 1;
        if ($article->save()) {
            return response()->json([
                'data' => $article->load('tags', 'user', 'comments.user')
            ], 200);
        } else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again ! !',
                'status_code'   =>  500
            ], 500);
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image'   =>  'required|image|mimes:jpg,png,jpeg',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = auth()->user()->id;
        $path = $request->file('image')->store('articles_images');
        $article->image = $path;

        if ($request->tag_ids) {
            $tag_ids = explode(',', $request->tag_ids);
        }

        if ($article->save()){
            $article->tags()->attach($tag_ids);
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
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = auth()->user()->id;

        $oldPath = $article->image;
        if ($request->hasFile('image')){
            $request->validate([
                'image'   =>  'image|mimes:jpg,png,jpeg',
            ]);
            $path = $request->file('image')->store('articles_images');
            $article->image = $path;

            Storage::delete($oldPath);
        }

        if ($request->tag_ids) {
            $tag_ids = explode(',', $request->tag_ids);
        }

        if ($article->save()){
            if ($request->tag_ids) {
                $article->tags()->sync($tag_ids);
            }
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
        $article->tags()->detach();
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

    public function tags()
    {
        $tags = Tag::all();
        return response()->json([
            'data' => $tags
        ], 200);
    }

    public function getArticleByCategory($id)
    {
        $articles = Article::with('tags', 'user')->where('category_id', $id)->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getArticleByTag($id)
    {
        $articles = Article::with('tags', 'user')
            ->whereHas('tags', function($query) use ($id) {
            $query->where('id', $id);
        })->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getArticleByUser($id)
    {
        $articles = Article::with('tags', 'user')->where('user_id', $id)->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getLatestArticle() {
        $articles = Article::with('tags', 'user')->orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getMostViewArticle() {
        $articles = Article::with('tags')->orderBy('views', 'desc')->take(3)->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getHottestArticle() {
        $articles = Article::orderBy('views', 'desc')->paginate(8);
        return response()->json([
            'data' => $articles
        ], 200);
    }

    public function getComment($id)
    {
        $article = Article::find($id);
        return response()->json([
            'data' => $article->comments
        ], 200);
    }

    public function search(Request $request)
    {

        $title = $request->title;
        $category_id = $request->category_id;
        $articles = Article::with('tags')->when($title, function ($q) use ($title) {
                                                    return $q->where('title', 'like', '%'.$title.'%');
                                                })
                                                ->when($category_id != 'null', function ($q) use ($category_id) {
                                                    return $q->where('category_id', $category_id);
                                                })
                                                ->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }
}
