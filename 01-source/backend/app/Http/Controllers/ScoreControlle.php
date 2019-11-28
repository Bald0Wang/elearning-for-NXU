<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreControlle extends Controller
{
    public function findScore()
    {
        $scores = Score::all();
        dd($scores);
        
    }
    public function findScoreBySId($stuId,$papId)
    {

        $score = Score::where('student_id',$stuId)->where('paper_id',$papId)->first();
        dd($score);
        
    }
    public function addScore($stuId,$papId,$Score)
    {
        $score = new Score;
        $score->student_id = $stuId;
        $score->paper_id = $papId;
        $score->score = $Score;
        if($score->save()){
            echo '添加成绩成功！';
         }else{
            echo '添加成绩失败！';
        }
    }
    public function updateScore($stuId,$papId,$score)
    {
        $score = Score::where('student_id',$stuId)->where('paper_id',$papId);
        $score->score = $score;
        if($score->save()){
            echo '更新分数成功！';
         }else{
            echo '更新分数失败！';
        }
    }
    public function deleteScore($stuId,$papId)
    {
        $score = Score::where('student_id',$stuId)->where('paper_id',$papId);
        if($score->delete()){
            echo '分数删除成功！';
        }else{
            echo '分数删除失败！';
        }
    }
}
