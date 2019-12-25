<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function getuser(Request $request)
    {   
        if($request->isMethod('GET')){
            $code=$request->input('code');
            // $code="071VtCgF01GZ5e25NLfF0OhEgF0VtCgH"; //测试
            $appid = "wxc4fc72c6e7115ba9";
            $secret = "f76889618f1d723500f66aa38ee15122";
            $api = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
            // $str = httpGet($api);
            $str = file_get_contents($api);
            // 直接调用方法
            $str = json_decode($str,true);
            // 数据转化方式
            return response()->json([
                'data'=>$str,
                'status' => 'ok',
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
