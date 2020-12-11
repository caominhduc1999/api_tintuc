<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::orderBy('created_at', 'desc')->paginate(10); // sắp xếp theo tgian tạo và phân trang (10 record/ trang)
        return response()->json([
            'data' => $users
        ], 200); // trả về dữ liệu dạng json
    }

    public function show(User $user)
    {
        // hàm này để xem bản ghi
        return response()->json([
            'data' => $user
        ], 200);
    }

    public function store(Request $request)
    {
        /*
         * validate dữ liệu:
         * required: bắt buộc nhập
         * unique(x, y, z): giá trị duy nhất trong bảng x cột y ngoại trừ record z
         * email: phải ở dạng email
         * min|max: độ dài kí tự nhập
         * */

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:32'
        ]);

        $user = new User(); //tạo mới đối tượng
        $user->name = $request->name; //gán dữ liệu cho đối tượng
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //mã hóa password

        if ($user->save()){ //tiến hành lưu và nếu lưu thành công
            return response()->json([
                'data' => $user
            ], 201);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'min:8|max:32'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) { //nếu có yêu cầu đổi password
            $user->password = bcrypt($request->password);
        }

        if ($user->save()){
            return response()->json([
                'data' => $user
            ], 200);
        }else{
            return response()->json([
                'message'   =>  'Some errors occurred. Please try again !',
                'status_code'   =>  500
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        if($user->delete()){
            return response()->json([
                'message'   =>  'User deleted successfully !',
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
        $email = $request->email;
        //when(x): khi có request x thì mới tiến hành search theo trường x này
        $articles = User::when($name, function ($q) use ($name) {
                return $q->where('name', 'like', '%'.$name.'%'); //tìm kiếm theo tên
            })
            ->when($email, function ($q) use ($email) {
                return $q->where('email', 'like', '%'.$email.'%'); //tìm kiếm theo email
            })
            ->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }
}
