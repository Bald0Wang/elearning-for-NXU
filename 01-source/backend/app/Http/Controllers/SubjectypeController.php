<?php

namespace App\Http\Controllers;
use App\Models\Subjectype;
use Illuminate\Http\Request;

class SubjectypeController extends Controller
{
    public function type(Request $request){
        if($request->isMethod('GET')){
            // $paper=Subjectype::where('id',$id)->get();
            // $paper
            // $start_time=$request->input('start_time'); 
            // $end_time=$request->input('end_time');   
            return response()->json([
                // 'paper' => $paper,
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
