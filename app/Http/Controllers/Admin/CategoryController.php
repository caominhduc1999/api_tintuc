<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    * HTTP STATUS:
    * 200: xử lý thành công
    * 201: thêm thành công
    * 204: xóa và ko trả về gì cả
    * 500: lỗi server
    *
    * */

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10); // sắp xếp theo tgian tạo và phân trang (10 record/ trang)
        return response()->json([
           'data' => $categories
        ], 200); // trả về dữ liệu dạng json
    }

    public function store(Request $request)
    {
        /*
        * validate dữ liệu:
        * required: bắt buộc nhập
        * unique(x, y, z): giá trị duy nhất trong bảng x cột y ngoại trừ record z
        * */

        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);

        $category = new Category(); //tạo mới đối tượng
        $category->name = $request->name; //gán dữ liệu cho đối tượng

        if ($category->save()){ //tiến hành lưu và nếu lưu thành công
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
        if($category->delete()){ //nếu xóa thành công
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
        $categories = Category::where('name', 'like', '%'.$name.'%')->orderBy('created_at', 'desc')->get(); //tìm kiếm theo tên + sắp xếp
        return response()->json([
            'data' => $categories
        ], 200);
    }
}
