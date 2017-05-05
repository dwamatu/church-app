<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventGoer extends Model
{
    public $timestamps = false;
    protected $table ='eventgoers';
    protected $primaryKey ='r_id';
}
