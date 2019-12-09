<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collation extends Model
{
    protected $table='collations';
    protected $filltable=['subjectype_id','created_at','updated_at'];
}
