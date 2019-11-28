<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table='scores';
    protected $filltable=['student_id','paper_id','score'];
}
