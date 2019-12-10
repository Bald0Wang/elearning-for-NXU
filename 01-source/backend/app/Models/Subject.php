<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['subjectype_id','subhardtype','ask','askans','ans'];
    
    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment');
    // }
}
