<?php

namespace App\Http\Controllers;

use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class TestimonyLikersController extends Controller
{
    protected $response = array();

    //<editor-fold desc="Testimony">
    private function validateTestimonyLikerCreate($content)
    {
        if (!isset($content['user_email']) || empty($content['user_email'])) {
            $this->response['errors'] = 'TestimonyLiker Details required';
        }

        return !isset($this->response['errors']);
    }


    public function createTestimonyLiker(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'user_email' => 'required|email',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validateTestimonyLikerCreate($params)) {
                $resource = 'testimonylikers';
                //retrieve record id
                $record_id = FunctionsUtilities::SaveTestimonyLiker($resource, $params);
                //create response
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "TestimonyLiker Details required";
        }
        return $this->response;
    }


    private function validateTestimonyLikerUpdate($content)
    {
        if (!isset($content['test_id']) || empty($content['test_id'])) {
            $this->response['errors'][] = 'test_id is required';
        }


        return !isset($this->response['errors']);
    }

    public function updateTestimonyLiker(Request $request, $resource_id)
    {
        $params = collect($request->all());
        $validator = Validator::make($params->toArray(), array(
            'test_id' => 'required',

        ));


        if ($validator->passes()) {

            if (self::validateTestimonyLikerUpdate($params)) {
                $resource = 'testimonylikers';

                $data = BaseController::fetchOne($resource, $params['test_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['test_id'];
                $params = $params->forget('test_id');


                $boolUpdated = FunctionsUtilities::UpdateTestimonyLiker($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'test_id is required';
        }
        return $this->response;

    }
    //</editor-fold>
}
