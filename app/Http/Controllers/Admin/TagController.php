<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
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
        $tags = Tag::orderBy('created_at', 'desc')->paginate(10); // sắp xếp theo tgian tạo và phân trang (10 record/ trang)
        return response()->json([
            'data' => $tags
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
            'name' => 'required|unique:tags,name'
        ]);

        $tag = new Tag(); //tạo mới đối tượng
        $tag->name = $request->name; //gán dữ liệu cho đối tượng

        if ($tag->save()){ //tiến hành lưu và nếu lưu thành công
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
        if($tag->delete()){ //nếu xóa thành công
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
        $tags = Tag::where('name', 'like', '%'.$name.'%')->orderBy('created_at', 'desc')->get(); //tìm kiếm theo tên + sắp xếp
        return response()->json([
            'data' => $tags
        ], 200);
    }
}
