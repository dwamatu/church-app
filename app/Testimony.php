<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    public $timestamps = false;
    protected $table ='testimonies';
    protected $primaryKey ='testimony_id';
}
