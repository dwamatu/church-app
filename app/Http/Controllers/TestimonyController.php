<?php

namespace App\Http\Controllers;

use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class TestimonyController extends Controller
{
    protected $response = array();

    //<editor-fold desc="Testimony">
    private function validateTestimonyCreate($content)
    {
        if (!isset($content['testimony_title']) || empty($content['testimony_title'])) {
            $this->response['errors'] = 'Preaching Details required';
        }

        return !isset($this->response['errors']);
    }


    public function createTestimony(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'testimony_title' => 'required',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validateTestimonyCreate($params)) {
                $resource = 'testimonies';
                //retrieve record id
                $record_id = FunctionsUtilities::SaveTestimony($resource, $params);
                //create response
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "Testimony Details required";
        }
        return $this->response;
    }


    private function validateTestimonyUpdate($content)
    {
        if (!isset($content['testimony_id']) || empty($content['testimony_id'])) {
            $this->response['errors'][] = 'testimony_id is required';
        }


        return !isset($this->response['errors']);
    }

    public function updateTestimony(Request $request, $resource_id)
    {
        $params = collect($request->all());
        $validator = Validator::make($params->toArray(), array(
            'testimony_id' => 'required',

        ));


        if ($validator->passes()) {

            if (self::validateTestimonyUpdate($params)) {
                $resource = 'testimonies';

                $data = BaseController::fetchOne($resource, $params['testimony_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['testimony_id'];
                $params = $params->forget('testimony_id');


                $boolUpdated = FunctionsUtilities::UpdateTestimony($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'testimony_id is required';
        }
        return $this->response;

    }
    //</editor-fold>
}
