<?php

namespace App\Http\Controllers;

use App\Utilities\FunctionsUtilities;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class PrayerController extends Controller
{
    protected $response = array();

    //<editor-fold desc="Prayers">
    private function validatePrayerCreate($content)
    {
        if (!isset($content['about']) || empty($content['about'])) {
            $this->response['errors'] = 'Prayer Details required';
        }

        return !isset($this->response['errors']);
    }


    public function createPrayer(Request $request)
    {
        //retrieve all parametes
        $params = $request->all();

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'about' => 'required',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validatePrayerCreate($params)) {
                $resource = 'prayers';
                //retrieve record id
                $record_id = FunctionsUtilities::SavePrayer($resource, $params);
                //create response
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "Prayer Details required";
        }
        return $this->response;
    }


    private function validatePrayerUpdate($content)
    {
        if (!isset($content['prayer_id']) || empty($content['prayer_id'])) {
            $this->response['errors'][] = 'prayer_id is required';
        }


        return !isset($this->response['errors']);
    }

    public function updatePrayer(Request $request, $resource_id)
    {
        $params = collect($request->all());
        $validator = Validator::make($params->toArray(), array(
            'prayer_id' => 'required',

        ));


        if ($validator->passes()) {

            if (self::validatePrayerUpdate($params)) {
                $resource = 'prayers';

                $data = BaseController::fetchOne($resource, $params['prayer_id']);

                if (isset($data['error'])) {

                    $this->response['errors'][] = $data;
                }

                $resource_id = $params['prayer_id'];
                $params = $params->forget('prayer_id');


                $boolUpdated = FunctionsUtilities::UpdatePrayer($resource, $params->toArray(), $resource_id);

                if ($boolUpdated != false) {

                    $this->response["resource"] = json_decode(BaseController::fetchOne($resource, $resource_id), true);

                }

            }
        } else {
            $this->response['errors'][] = 'prayer_id is required';
        }
        return $this->response;

    }
    //</editor-fold>
}
