<?php

namespace App\Http\Controllers;

use App\Preaching;
use App\Utilities\ApiUtilities;
use App\Utilities\FileUtilities;
use App\Utilities\FunctionsUtilities;
use App\Utilities\ServerSideUtilities;
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
    public function addPreachings()
    {
        $pageData = collect();
        $pageData->put("page_title", "Add Preachings");
        return view('preachings.create', ['pageData' => $pageData->toArray()]);
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
        $resource = 'preachings';
        //retrieve all parametes
        $params = $request->only(['preached_on', 'by', 'streams', 'downloads', 'likes']);

        \Log::info('creatingPreaching::request', [$params]);

        $file = $request->file('title');

        $filename = $request->file('title')->getClientOriginalName();
        //LOGGING
        $params['title'] = $filename;


        \Log::info('creatingPreaching::request', [$params]);

        //Validate Event Name is unique
        $validator = Validator::make($params, array(
            'title' => 'required',

        ));
        //
        if ($validator->passes()) {
            //validate required parameters are provided
            if (self::validatePreachingCreate($params)) {

                //retrieve record id
                $record_id = FunctionsUtilities::SavePreaching($resource, $params);
                FileUtilities::storeFile($resource,$record_id, $file,$filename);
                //create response
                $this->response['resource'] = BaseController::fetchOne($resource, $record_id);
                //return response
            }
        } else {
            $this->response['errors'] = "Preaching Details required";
        }

        return redirect('/preachings');

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

    public function fetchPreachings(Request $request){



        // Get DataTables server side parameters
        $pageIndex = $request['start'];
        $draw = $request['draw'];
        $pageLength = $request['length'];
        $q = $request['search']['value'];

        $currentpageIndex = (int)(((int)$pageIndex) / ((int)$pageLength));
        $pageIndex = $currentpageIndex;

        $url = ApiUtilities::MakeAPIURL("/api/v1/preachings?pageSize=$pageLength&offSet=$pageIndex");

        $apiResponse = ServerSideUtilities::getBasicServerSideData($draw, $url);

        return  $apiResponse;
    }




}