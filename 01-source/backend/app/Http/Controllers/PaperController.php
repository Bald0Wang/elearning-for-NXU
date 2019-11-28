<?php

namespace App\Http\Controllers;
use App\Models\Paper;
use App\Models\Subject;
use App\Models\SubjectType;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function paperindex(Request $request,$id){
        if($request->isMethod('GET')){
            $papernew=Paper::where('id',$id)->get();
            $subid=$papernew[0]->subjectype_id;
            $sub=Subject::where('id',$subid)->get();
            $subname=$sub[0]->subjectype_id;
            $subrname=SubjectType::where('id',$subname)->get();
            $s=$subrname[0]->subtype;
            if($s==2){
                $s='政治';
            }elseif ($s==1) {
                # code...
                $s='英语';
            }else{
                $s='none';
            }
            
            // $paper
            // $start_time=$request->input('start_time'); 
            // $end_time=$request->input('end_time');   
            return response()->json([
                '试卷类型' => $s,
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

// public function paperindex(Request $request){
    //     if($request->isMethod('POST')){
    //         $imsi=$request->input('imsi');
    //         $start_time=$request->input('start_time');  //2018-03-02 13:45:42  传入初试时间
    //         $end_time=$request->input('end_time');   //2018-03-02 13:45:42 传入
    //         return response()->json([
    //             'imsi' => $imsi,
    //             'status' => 'success',
    //             'status_code' => 200,
    //         ]); 
    //     }
    // }
    // 