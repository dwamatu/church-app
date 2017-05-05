<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventGoer;
use App\Preaching;
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
    public function issueGetRequest($table, $id = null)
    {

        if (Schema::hasTable($table)) {
            if ($id != null) {
                $data = self::fetchOne($table, $id);
                if (isset($data['error'])) {
                    $this->response['errors'] = $data;
                } else {
                    $this->response['resource'] = $data;
                }
            } else {

                $this->response['results'] = DB::table($table)->get();

            }
            return $this->response;
            //
        } else {
            $this->response['errors'] = ['status_code' => 404, "error" => "resource $table does not exits"];
        }
        return $this->response;

    }

    public function fetchOne($resource, $id)
    {
        $models = [
            'events' => Event::class,
            'preachings' => Preaching::class,
            'eventgoers' => EventGoer::class,

        ];

        try {
            $data = $models[$resource]::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            $data = ["status_code" => 404, 'error' => "$resource not found"];
        }

        return $data;

    }

    //</editor-fold>

    //<editor-fold desc="Events">

    private function validateEventCreate($content)
    {
        if (!isset($content['ename']) || empty($content['ename'])) {
            $this->response['errors'][] = 'ename required';
        }

        return !isset($this->response['errors']);
    }


    public function createEvent(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();
        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'ename' => 'required|unique:events,ename',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validateEventCreate($params)) {
                $resource = 'events';
                //retrieve record id
                $record_id = FunctionsUtilities::SaveEvent($resource, $params);
                //create response
                $this->response["resource"] = self::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response = ["status_code" => 404, 'error' => "ename must be unique"];
        }
        return $this->response;
    }


    private function validateEventUpdate($content)
    {
        if (!isset($content['ename']) || empty($content['ename'])) {
            $this->response['errors'][] = 'event_idm required';
        }

        return !isset($this->response['errors']);
    }

    //Updating an Event
    public function updateEvent(Request $request, $resource_id)
    {

        $params = collect($request->all());

        $validator = Validator::make($params->toArray(), array(
            'event_idm' => 'required',

        ));

        if ($validator->passes()) {
            if (self::validateEventUpdate($params)) {
                $resource = 'events';

                $data = self::fetchOne($resource, $params['event_idm']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['event_idm'];
                $params = $params->forget('event_idm');
                $params = $params->forget('ename');

                $boolUpdated = FunctionsUtilities::UpdateEvent($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(self::fetchOne($resource, $resource_id), true);

                }

            }
        }


        return $this->response;

    }

    //</editor-fold>

    private function validateEventGoerCreate($content)
    {
        if (!isset($content['event_id']) || empty($content['event_id'])) {
            $this->response['errors'] = 'event_id is required';
        }

        return !isset($this->response['errors']);
    }


    public function createEventGoer(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'event_id' => 'required',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validateEventGoerCreate($params)) {
                $resource = 'eventgoers';
                //retrieve record id
                $record_id = FunctionsUtilities::SaveEventGoer($resource, $params);
                //create response
                $this->response['resource'] = self::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "event_id is required";
        }
        return $this->response;
    }


    private function validateEventGoerUpdate($content)
    {
        if (!isset($content['r_id']) || empty($content['r_id'])) {
            $this->response['errors'][] = 'r_id is required';
        }


        return !isset($this->response['errors']);
    }

    public function updateEventGoer(Request $request, $resource_id)
    {
        $params = collect($request->all());
        $validator = Validator::make($params->toArray(), array(
            'r_id' => 'required',

        ));


        if ($validator->passes()) {

            if (self::validateEventGoerUpdate($params)) {
                $resource = 'eventgoers';

                $data = self::fetchOne($resource, $params['r_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['r_id'];
                $params = $params->forget('r_id');


                $boolUpdated = FunctionsUtilities::UpdateEventGoer($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(self::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'r_id is required';
        }
        return $this->response;

    }
}
