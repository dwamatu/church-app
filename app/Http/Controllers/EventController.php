<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function showEvents()
    {
        $pageData = collect();
        $pageData->put("page_title", "Events");
        return view('event.list', ['pageData' => $pageData->toArray()]);
    }


}
