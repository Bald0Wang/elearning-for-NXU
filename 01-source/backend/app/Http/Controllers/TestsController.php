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
        if(1){//判断用户是否有访问接口的权限
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
            ]); 
        }else{
            return \Response::json([
                'status'=>'not found',
                'status_code'=> 404,
            ]);
        }       
    }
}
