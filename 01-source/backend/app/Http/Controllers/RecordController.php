<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function findRecord(Request $request){
        if($request->isMethod('GET')){
            $records=Record::all();
            return response()->json([
                'records' =>$records,
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
    
    public function findRecordBySId(Request $request,$stuId){
        if($request->isMethod('GET')){
            $record=Record::where('student_id',$stuId)->get();
            return response()->json([
                'record' =>$record,
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

    public function addRecord(Request $request){
        if($request->isMethod('POST')){
            $stuId=$request->input('stuId');
            $recType=$request->input('recType');
            $Index=$request->input('Index');
            $Correct=$request->input('Correct');
            $record = new Record;
            $record->student_id = $stuId;
            $record->record_type = $recType;
            $record->index = $Index;
            $record->correct = $Correct;
            if($record->save()){
                return response()->json([
                    'record' =>$record,
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

    // public function deleteRecord($stuId){
    //     if($request->isMethod('POST')){
    //         $record = Record::where('student_id',$stuId);
    //         if($record->delete()){
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
