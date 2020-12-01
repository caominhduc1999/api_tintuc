<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'data' => $tags
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;

        if ($tag->save()){
            return response()->json([
                'data' => $tag
            ], 201);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,'.$tag->id,
        ]);

        $tag->name = $request->name;

        if ($tag->save()){
            return response()->json([
                'data' => $tag
            ], 200);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function destroy(Tag $tag)
    {
        if($tag->delete()){
            return response()->json([
                'message'   =>  'Tag deleted successfully !',
                'status_code'   =>  204
            ], 204);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $tags = Tag::where('name', 'like', '%'.$name.'%')->orderBy('created_at', 'desc')->get();
        return response()->json([
            'data' => $tags
        ], 200);
    }
}
