<?php

namespace App\Http\Controllers;
use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function paperindex(Request $request,$id){
        if($request->isMethod('GET')){
            $paper=Paper::where('id',$id)->get();
            // $paper
            // $start_time=$request->input('start_time'); 
            // $end_time=$request->input('end_time');   
            return response()->json([
                'paper' => $paper[0]->introdcution,
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
    //         $end_time=$request->inp  ut('end_time');   //2018-03-02 13:45:42 传入
    //         return response()->json([
    //             'imsi' => $imsi,
    //             'status' => 'success',
    //             'status_code' => 200,
    //         ]); 
    //     }
    // }
    // 