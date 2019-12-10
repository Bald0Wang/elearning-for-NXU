<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paperin extends Model
{
    protected $table = 'paperins';
    protected $fillable = ['paper_id','subject_id','subjectype_id','created_at','updated_at'];
    
    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment');
    // }
}
