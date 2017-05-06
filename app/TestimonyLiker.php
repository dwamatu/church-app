<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonyLiker extends Model
{
    public $timestamps = false;
    protected $table ='testimonylikers';
    protected $primaryKey ='test_id';
}
