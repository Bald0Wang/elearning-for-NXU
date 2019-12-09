<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_collection_mn extends Model
{
    protected $table='student_collection_mns';
    protected $filltable=['student_id','collection_id','created_at','updated_at'];
}
