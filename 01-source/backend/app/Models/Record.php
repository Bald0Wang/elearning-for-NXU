<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table='records';
    protected $filltable=['student_id','record_type','index','correct'];
}
