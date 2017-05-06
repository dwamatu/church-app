<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventGoer;
use App\Prayer;
use App\Preaching;
use App\Testimony;
use App\TestimonyLiker;
use App\Utilities\FunctionsUtilities;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Mockery\Exception;
use Schema;


class BaseController extends Controller
{
    protected $response = array();




    //<editor-fold desc="Issue Get Request">
    //
    public function issueGetRequest(Request $request, $table, $id = null)
    {

        $pageSize = $request->query('pageSize');
        $offSet = $request->query('offSet');
        $all = $request->query('all');


        if (Schema::hasTable($table)) {
            if ($id != null) {
                $data = self::fetchOne($table, $id);
                if (isset($data['error'])) {
                    $this->response['errors'] = $data;
                } else {

                    $this->response['resource'] = $data;
                }
            } else {
                $this->response = FunctionsUtilities::fetchList($table,$pageSize,$offSet,$all);

            }
            return $this->response;
            //
        } else {
            $this->response['errors'] = ['status_code' => 404, "error" => "resource $table does not exits"];
        }
        return $this->response;

    }

    public static function fetchOne($resource, $id)
    {
        $models = [
            'events' => Event::class,
            'preachings' => Preaching::class,
            'eventgoers' => EventGoer::class,
            'prayers' => Prayer::class,
            'testimonies' => Testimony::class,
            'testimonylikers' => TestimonyLiker::class,

        ];

        try {
            $data = $models[$resource]::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            $data = ["status_code" => 404, 'error' => "$resource not found"];
        }

        return $data;

    }

    //</editor-fold>





}
