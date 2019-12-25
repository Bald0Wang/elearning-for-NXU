<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['subjectype_id','subhardtype','ask','askansA','askansB','askansC','askansD','ans','created_at','updated_at'];
    //本表没有对后台系统修改
    // public function equipment()
    // {
    //     return $this->belongsTo('App\Models\Equipment');
    // }
}
