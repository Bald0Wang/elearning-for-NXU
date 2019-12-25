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

        //         $imsi=$request->input('imsi');
        //         $start_time=$request->input('start_time');  //2018-03-02 13:45:42  传入初试时间
        //         $end_time=$request->input('end_time'); 
    public function tests()
    {
        if(1){//判断用户是否有访问接口的权限
            return response()->json([
                'status' => '###lyjdzt',
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
