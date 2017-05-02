<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preaching extends Model
{
    //
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table ='preachings';
    protected $primaryKey ='preaching_id';
}
