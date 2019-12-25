<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Student_paper_mn;
use Auth;

class Student_paper_mnController extends Controller
{
    public function student_paper_mn_index(Request $request){
        if($request->isMethod('GET')){
            $userid = $request->input('userid');
            $paperid = $request->input('paperid');

            $Student_paper_mn = new Student_paper_mn;
            $Student_paper_mn->student_id=$userid;
            $Student_paper_mn->paper_id=$paperid;
            $Student_paper_mn->save();
            $spid=$Student_paper_mn->id;
            // // $Student_paper_mn_new = Student_paper_mn::all();
            
            return response()->json([
                'spid' => $spid,
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
