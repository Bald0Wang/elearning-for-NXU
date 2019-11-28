<?php

namespace App\Http\Controllers;
use App\Models\Explaination;
use Illuminate\Http\Request;

class ExplainationController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('GET')){
            // $paper=Explaination::where('id',$id)->get();
            // $paper
            // $start_time=$request->input('start_time'); 
            // $end_time=$request->input('end_time');   
            return response()->json([
                // 'paper' => $paper[0]->introdcution,
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
