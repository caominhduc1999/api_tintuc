<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'data' => $users
        ], 200);
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => $user
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:32'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()){
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
        if ($request->password) {
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
        $articles = User::when($name, function ($q) use ($name) {
                return $q->where('name', 'like', '%'.$name.'%');
            })
            ->when($email, function ($q) use ($email) {
                return $q->where('email', 'like', '%'.$email.'%');
            })
            ->get();
        return response()->json([
            'data' => $articles
        ], 200);
    }
}
