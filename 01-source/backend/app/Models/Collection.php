<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use Auth;

class CollectionController extends Controller
{
    public function collectionindex(Request $request,$id){
        if($request->isMethod('GET')){
            //写你需要获取的数据
            
            $collection = collection::where('id',$id)->get();
            //$typeid=$subject[0]->subjectype_id;
            return response()->json([
                //写你需要获取的数据值
                'status'=>'success',
                'status_code'=>200,
            ]);
        }
        else{
            return response()->json([
                'status'=>'error',
                'status_code'=>404,
            ]);
        }
    }
}
