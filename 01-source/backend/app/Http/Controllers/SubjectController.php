<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subjectindex(Request $request,$id){
        if($request->isMethod('GET')){
            //写你需要获取的数据
            $subject=Subject::where('id',$id)->get();
            return response()->json([
                'data'=>$subject,
                'status' => 'success',
                'status_code' => 200,
            ]); 
        }else{
            return response()->json([
                'status' => 'error',
                'status_code' => 404,
            ]); 
        }
    }
    
}
