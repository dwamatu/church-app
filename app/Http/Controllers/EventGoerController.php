<?php

namespace App\Http\Controllers;

use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class EventGoerController extends Controller
{
    protected $response = array();
    //<editor-fold desc="EventGoers">
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
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
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

                $data = BaseController::fetchOne($resource, $params['r_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['r_id'];
                $params = $params->forget('r_id');


                $boolUpdated = FunctionsUtilities::UpdateEventGoer($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'r_id is required';
        }
        return $this->response;

    }
    //</editor-fold>
}
