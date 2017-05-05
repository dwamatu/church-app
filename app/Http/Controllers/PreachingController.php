<?php

namespace App\Http\Controllers;

use App\Preaching;
use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class PreachingController extends Controller
{
    protected $response = array();

    public function showPreachings()
    {
        $pageData = collect();
        $pageData->put("page_title", "Preachings");
        return view('preachings.list', ['pageData' => $pageData->toArray()]);
    }

    //<editor-fold desc="Prayers">
    private function validatePreachingCreate($content)
    {
        if (!isset($content['title']) || empty($content['title'])) {
            $this->response['errors'] = 'Preaching Details required';
        }

        return !isset($this->response['errors']);
    }


    public function createPreaching(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'title' => 'required',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validatePreachingCreate($params)) {
                $resource = 'preachings';
                //retrieve record id
                $record_id = FunctionsUtilities::SavePreaching($resource, $params);
                //create response
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "Preaching Details required";
        }
        return $this->response;
    }


    private function validatePreachingUpdate($content)
    {
        if (!isset($content['preaching_id']) || empty($content['preaching_id'])) {
            $this->response['errors'][] = 'preaching_id is required';
        }


        return !isset($this->response['errors']);
    }

    public function updatePreaching(Request $request, $resource_id)
    {
        $params = collect($request->all());
        $validator = Validator::make($params->toArray(), array(
            'preaching_id' => 'required',

        ));


        if ($validator->passes()) {

            if (self::validatePreachingUpdate($params)) {
                $resource = 'preachings';

                $data = BaseController::fetchOne($resource, $params['preaching_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['preaching_id'];
                $params = $params->forget('preaching_id');


                $boolUpdated = FunctionsUtilities::UpdatePreaching($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'preaching_id is required';
        }
        return $this->response;

    }
    //</editor-fold>
}