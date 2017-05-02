<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table ='events';
    protected $primaryKey ='event_idm';

}