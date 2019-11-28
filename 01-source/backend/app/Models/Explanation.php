<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
{
    protected $table = 'explanations';
    protected $fillable = ['subject_id','explan'];
    
    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment');
    // }
}
