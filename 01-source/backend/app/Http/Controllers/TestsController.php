<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TestsController extends Controller
{
    /**
     * 获取用户列表
     */
    public function tests()
    {
        $user = auth('api')->user();
        if($user!=""){//判断用户是否有访问接口的权限
            $users = User::all();
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'users' => $users,
                'user' => $user
            ]); 
        }else{
            return \Response::json([
                'status'=>'not found',
                'status_code'=> 404,
            ]);
        }       
    }
}
