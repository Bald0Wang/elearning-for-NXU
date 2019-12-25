<?php

namespace App\Http\Controllers;
use App\Models\Paper;
use App\Models\Paperin;
use App\Models\Subject;
use App\Models\SubjectType;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function scoreupload(Request $request){
        if($request->isMethod('GET')){
            // http://127.0.0.1:8000/api/v1/scores?score=100&paper_id=1&student_id=20
            $paper_id = $request->input('paper_id');
            $student_id = $request->input('student_id');
            $score = $request->input('score');

            $scores=new Score;
            $scores->paper_id=$paper_id;
            $scores->student_id=$student_id;
            $scores->score=$score;
            $scores->save();

            $id=$scores->id;
            return response()->json([
                'id' =>$id ,
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
    public function scorelist(Request $request){
        if($request->isMethod('GET')){
            // $score = $request->input('score');
            // $paper_id = $request->input('paper_id');
            $student_id = $request->input('student_id');
            $scores=Score::where('student_id',$student_id)->get();
            $avg=0;
            $max=0;
            $min=0;
            $scorelist=array();
            $willlist=array(0,0,0,0,0,0,0,0,0,0,0);
            $will=0;
            $temp=0;
            if(sizeof($scores)){
                for($i=0;$i<sizeof($scores);$i++){
                    array_push($scorelist,$scores[$i]->score);
                    $willlist[(int)($scores[$i]->score/10)]++;
                }
                $max=max($scorelist);
                $min=min($scorelist);
                $avg=round(array_sum($scorelist)/sizeof($scorelist),2);
                for($i=0;$i<sizeof($willlist);$i++){
                    if($willlist[$i]>=$willlist[$temp]){
                        $temp=$i;
                    }
                }
                $will=$temp*10;
                if($will<$avg){
                    $will=$avg;
                }
            }
            return response()->json([
                // 'scores' =>$scores ,
                'avg'=>$avg,
                'max'=>$max,
                'min'=>$min,
                'will'=>$will,
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

    public function scoreuserlog(Request $request){
        if($request->isMethod('GET')){
            $student_id = $request->input('student_id');
            $scores=Score::where('student_id',$student_id)->get();
            if(sizeof($scores)){
                for($i=0;$i<sizeof($scores);$i++){
                    $paperid=$scores[$i]->paper_id;
                    $paper=Paper::where('id',$paperid)->get()[0];
                    $scores[$i]['introdcution']=$paper->introdcution;
                    // $scores[$i]['introdcution']=$paper->introdcution;
                }
            }
            return response()->json([
                'scores' =>$scores ,
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
    // public function findScoreBySId(Request $request,$stuId,$papId){
    //     if($request->isMethod('GET')){
    //         $score=Score::where('student_id',$stuId)->where('paper_id',$papId)->get();
    //         return response()->json([
    //             'score' =>$score ,
    //             'status' => 'success',
    //             'status_code' => 200,
    //         ]); 
    //     }else{
    //         return response()->json([
    //             'status' => 'error',
    //             'status_code' => 404,
    //         ]); 
    //     }
    // }

    // public function addScore(Request $request){
    //     if($request->isMethod('POST')){
    //         $stuId=$request->input('stuId');
    //         $papId=$request->input('papId');
    //         $Score=$request->input('Score');
    //         $score = new Score;
    //         $score->student_id = $stuId;
    //         $score->paper_id = $papId;
    //         $score->score = $Score;
    //         if($score->save()){
    //             return response()->json([
    //                 'score' =>$score ,
    //                 'status' => 'success',
    //                 'status_code' => 200,
    //             ]); 
    //         }
    //     }else{
    //         return response()->json([
    //             'status' => 'error',
    //             'status_code' => 404,
    //         ]); 
    //     }
    // }
    
    // public function updateScore(Request $request){
    //     if($request->isMethod('POST')){
    //         $stuId=$request->input('stuId');
    //         $papId=$request->input('papId');
    //         $Score=$request->input('Score');
    //         $score=new Score;
    //         $score = Score::where('student_id',$stuId)->where('paper_id',$papId)->get();
    //         $score->score = $Score;
    //         if($score->save()){
    //             return response()->json([
    //                 'score' =>$score ,
    //                 'status' => 'success',
    //                 'status_code' => 200,
    //             ]); 
    //         }
    //     }else{
    //         return response()->json([
    //             'status' => 'error',
    //             'status_code' => 404,
    //         ]); 
    //     }
    // }
    
    // public function deleteScore(Request $request,$stuId,$papId){
    //     if($request->isMethod('POST')){
    //         $score = Score::where('student_id',$stuId)->where('paper_id',$papId);
    //         if($score->delete()){
    //             return response()->json([
    //                 'status' => 'success',
    //                 'status_code' => 200,
    //             ]); 
    //         }
    //     }else{
    //         return response()->json([
    //             'status' => 'error',
    //             'status_code' => 404,
    //         ]); 
    //     }
    // } 
    
 
}
