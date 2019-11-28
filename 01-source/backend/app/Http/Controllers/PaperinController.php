<?php

namespace App\Http\Controllers;
use App\Models\Paperin;
use Illuminate\Http\Request;

class PaperinController extends Controller
{
    public function paperin(Request $request,$id){
        if($request->isMethod('GET')){
            $paper=Paperin::where('id',$id)->get();
            // $paper
            // $start_time=$request->input('start_time'); 
            // $end_time=$request->input('end_time');   
            return response()->json([
                'paper' => $paper,
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
