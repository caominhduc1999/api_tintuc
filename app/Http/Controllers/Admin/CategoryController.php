<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();
        return response()->json([
           'data' => $categories
        ], 200);
    }

    public function get($id)
    {
        $category = Category::find($id);
        return response()->json([
            'data' => $category
        ], 200);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'data' => $category
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'data' => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
           null
        ], 204);
    }
}
