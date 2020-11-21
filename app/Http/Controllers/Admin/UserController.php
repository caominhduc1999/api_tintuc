<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAll()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return response()->json([
            'data' => $users
        ], 200);
    }

    public function get($id)
    {
        $user = User::find($id);
        return response()->json([
            'data' => $user
        ], 200);
    }

    public function store(Request $request)
    {
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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

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

    public function destroy($id)
    {
        $user = User::find($id);
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
}
