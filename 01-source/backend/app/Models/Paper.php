<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{   
    protected $table = 'papers';
    protected $fillable = ['introdcution','usingfor',
    'hardtype','subjectype_id','sum0','sum1','sum2','scorealgorithm','created_at','updated_at'];
    
    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment');
    // }
}
