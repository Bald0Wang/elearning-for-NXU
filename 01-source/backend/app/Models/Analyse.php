<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    protected $table='analyses';
    protected $filltable=['student_id','paper_id','time'];
}
