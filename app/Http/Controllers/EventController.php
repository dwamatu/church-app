<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventGoer;
use App\Utilities\ApiUtilities;
use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    protected $response = array();

    public function showEvents()
    {
        $events  = Event::all();
        $pageData = collect();
        $pageData->put("page_title", "Events");
        $pageData->put("events", $events);

        return view('event.list', ['pageData' => $pageData->toArray()]);
    }

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
                $this->response["resource"] = BaseController::fetchOne($resource, $record_id);
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

                $data = BaseController::fetchOne($resource, $params['event_idm']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['event_idm'];
                $params = $params->forget('event_idm');
                $params = $params->forget('ename');

                $boolUpdated = FunctionsUtilities::UpdateEvent($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        }


        return $this->response;

    }

    //</editor-fold>

    public function fetchEvents(){
        $url = '/api/v1/events' ;

        $apiResponse = json_decode(ApiUtilities::IssueGETRequest(ApiUtilities::MakeAPIURL($url)),true)['results'];

        return array('data' => $apiResponse);
    }

}
