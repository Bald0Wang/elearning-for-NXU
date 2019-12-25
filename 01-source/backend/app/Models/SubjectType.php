<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    protected $table = 'subject_types';
    protected $fillable = ['subtype','anstype','created_at','updated_at'];
}
