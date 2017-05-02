<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Schema;
class BaseController extends Controller
{
    //
    public function retrieveList($table){
        if (Schema::hasTable($table))
        {
            //
            $data = DB::table($table)->get();
            return array('data'=>$data);
        }
        else {
            return response()->json(['status_code' => 404, "error" => "resource $table does not exits"]);
        }

    }
}
