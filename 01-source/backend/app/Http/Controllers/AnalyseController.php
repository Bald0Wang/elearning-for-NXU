<?php

namespace App\Http\Controllers;
use App\Models\Analyse;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    public function findAnalyse(Request $request){
        if($request->isMethod('GET')){
            $analyses=Analyse::all();
            return response()->json([
                'analyses' =>$analyses,
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

    public function findAnalyseBySId(Request $request,$stuId){
        if($request->isMethod('GET')){
            $analyse=Analyse::where('student_id',$stuId)->get();
            return response()->json([
                'analyse' =>$analyse,
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
    
    public function addAnalyse(Request $request,$stuId,$papId,$Time){
        if($request->isMethod('POST')){
            $analyse = new Analyse;
            $analyse->student_id = $stuId;
            $analyse->paper_id = $papId;
            $analyse->time = $Time;
            if($analyse->save()){
            return response()->json([
                'analyse' =>$analyse,
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
    
    public function updateAnalyse(Request $request,$stuId,$papId,$Time){
        if($request->isMethod('POST')){
            $analyse = Analyse::where('student_id',$stuId)->where('paper_id',$stuId);
            $analyse->time = $Time;
            if($analyse->save()){
                return response()->json([
                    'analyse' =>$analyse,
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

    public function deleteAnalyse(Request $request,$stuId,$papId){
        if($request->isMethod('POST')){
            $analyse = Analyse::where('student_id',$stuId)->where('paper_id',$stuId);
            if($analyse->delete()){
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
