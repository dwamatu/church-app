<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table ='groups';
    protected $primaryKey ='gid';
}
