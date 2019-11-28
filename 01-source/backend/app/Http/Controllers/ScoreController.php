<?php

namespace App\Http\Controllers;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function findScore(Request $request){
        if($request->isMethod('GET')){
            $scores=Score::all();
            return response()->json([
                'scores' =>$score ,
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
    public function findScoreBySId(Request $request,$stuId,$papId){
        if($request->isMethod('GET')){
            $score=Score::where('student_id',$stuId)->where('paper_id',$papId)->get();
            return response()->json([
                'score' =>$score ,
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

    public function addScore(Request $request,$stuId,$papId,$Score){
        if($request->isMethod('POST')){
            $score = new Score;
            $score->student_id = $stuId;
            $score->paper_id = $papId;
            $score->score = $Score;
            if($score->save()){
                return response()->json([
                    'score' =>$score ,
                    'status' => 'success',
                    'status_code' => 200,
                ]); 
            }
        }else{
            return response()->json([
                'status' => 'error',
                'status_code' => 404,
            ]); 
        }
    }
    
    public function updateScore(Request $request,$stuId,$papId,$Score){
        if($request->isMethod('POST')){
            $score = Score::where('student_id',$stuId)->where('paper_id',$papId);
            $score->score = $score;
            if($score->save()){
                return response()->json([
                    'score' =>$score ,
                    'status' => 'success',
                    'status_code' => 200,
                ]); 
            }
        }else{
            return response()->json([
                'status' => 'error',
                'status_code' => 404,
            ]); 
        }
    }
    
    public function deleteScore(Request $request,$stuId,$papId){
        if($request->isMethod('POST')){
            $score = Score::where('student_id',$stuId)->where('paper_id',$papId);
            if($score->delete()){
                return response()->json([
                    'status' => 'success',
                    'status_code' => 200,
                ]); 
            }
        }else{
            return response()->json([
                'status' => 'error',
                'status_code' => 404,
            ]); 
        }
    } 
    
}
