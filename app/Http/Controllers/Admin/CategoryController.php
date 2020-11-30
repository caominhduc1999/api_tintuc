<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
           'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($category->save()){
            return response()->json([
                'data' => $category
            ], 201);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        $category->name = $request->name;

        if ($category->save()){
            return response()->json([
                'data' => $category
            ], 200);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function destroy(Category $category)
    {
        if($category->delete()){
            return response()->json([
                'message'   =>  'Category deleted successfully !',
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
        $categories = Category::where('name', 'like', '%'.$name.'%')->get();
        return response()->json([
            'data' => $categories
        ], 200);
    }
}
