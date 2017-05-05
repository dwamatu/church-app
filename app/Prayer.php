<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    public $timestamps = false;
    protected $table ='prayers';
    protected $primaryKey ='prayer_id';
}
