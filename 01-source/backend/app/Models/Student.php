<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $filltable=['name','password','e-mail','phone','created_at','updated_at'];
}
