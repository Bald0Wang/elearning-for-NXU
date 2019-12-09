<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Student;
use Auth;

class StudentController extends Controller
{
    public function studentindex(Request $request,$id){
        if($request->isMethod('GET')){
            //写你需要获取的数据
            
            $student = student::where('id',$id)->get();
            //$typeid=$subject[0]->subjectype_id;
            return response()->json([
                //写你需要获取的数据值
                'status'=>'success',
                'status_code'=>200,
                //'test'=>$typeid,
            ]);

        }
        else{
            return response()->json([
                'status'=>'error',
                'status_code'=>404,
            ]);
        }
    }
}
