<?php

namespace App\Http\Controllers;

use App\Event;
use App\Preaching;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Schema;

class BaseController extends Controller
{
    //<editor-fold desc="Issue Get Request">
    //
    public function issueGetRequest($table, $id = null)
    {

        if (Schema::hasTable($table)) {
            if ($id != null) {
                $data = self::fetchOne($table, $id);
            } else {

                $data = DB::table($table)->get();

            }
            return array('data' => $data);
            //
        } else {
            return response()->json(['status_code' => 404, "error" => "resource $table does not exits"], 404);
        }

    }

    public function fetchOne($resource, $id)
    {
        $models = [
            'events' => Event::class,
            'preachings' => Preaching::class,

        ];

        try {
            $data = $models[$resource]::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            $data = ["status_code" => 404, 'error' => "Resource not found"];
        }

        return $data;

    }

    //</editor-fold>

    public function issuePostRequest( Request $request,$resource,$id=null)
    {
        $models = [
            'events' => Event::class,
            'preachings' => Preaching::class,

        ];

        if(!isset($models[$resource])){
            return response()->json(["status_code" => 404, 'error' => "Resource not found"],404);
        }
        else{
            $eventsData = $request->all();
            DB::table($resource)->insert(
                $eventsData
            );

        }

        return response()->json(["status_code" => 201, 'success' => "$resource added"],201);

    }
    //TODO Add Put Functionality.
    //TODO Add validation for updation  and creation.
    //TODO All models.

}
