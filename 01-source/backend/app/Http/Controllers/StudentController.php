<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Student;
use Auth;

    // /*
    //     |-------------------------------------------------------------------------------
    //     | 学生信息相关接口
    //     |-------------------------------------------------------------------------------
    //     | URL:            /api/v1/students
    //     | Controller:     
    //     | Method:         GET
    //     | Description:    获取学生信息
    //     */
    //     Route::get('/','StudentController@students');
    // });


class StudentController extends Controller
{
    public function students(Request $request){
        if($request->isMethod('GET')){
            //写你需要获取的数据
            $student = student::all();
            $userinfos = $request->input('userinfos');
            $session_key = $request->input('session_key');
            // $getuserinfo=$student[0]->userinfos;
            $userkey=$userinfos;
            $data=-1;
            if(sizeof($student)){
                for($i=0;$i<sizeof($student);$i++){
                    $nowkey=$student[$i]->userinfos;
                    if($nowkey==$userkey){
                        $data=$student[$i]->id;
                        break;
                    }
                }
                if($data>-1){
                    $statue='登陆成功';
                }else{//新建用户
                    $newstudent = new Student;
                    $newstudent->userinfos=$userinfos;
                    $newstudent->session_key=$session_key;
                    $newstudent->save();
                    $statue='新建成功';
                    $studentre = student::all();
                    $userkey=$newstudent->userinfos;
                    for($i=0;$i<sizeof($student);$i++){
                        $nowkey=$student[$i]->userinfos;
                        if($nowkey==$userkey){
                            $data=$student[$i]->id;
                            break;
                        }
                    }
                }
            }else
            {//新建用户
                $newstudent = new Student;
                $newstudent->userinfos=$userinfos;
                $newstudent->session_key=$session_key;
                $newstudent->save();
                $statue='新建成功';
                $studentre = student::all();
                $userkey=$newstudent->userinfos;
                for($i=0;$i<sizeof($student);$i++){
                    $nowkey=$student[$i]->userinfos;
                    if($nowkey==$userkey){
                        $data=$student[$i]->id;
                        break;
                    }
                }
            }
            
            return response()->json([
                //写你需要获取的数据值
                'now'=>$nowkey,
                'user'=>$data,
                'data_student'=>$statue,
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
