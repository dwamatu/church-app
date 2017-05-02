<?php

namespace App\Http\Controllers;

use App\Preaching;
use Illuminate\Http\Request;

use App\Http\Requests;

class PreachingController extends Controller
{
    public function showPreachings()
    {
        $pageData = collect();
        $pageData->put("page_title", "Preachings");
        return view('preachings.list', ['pageData' => $pageData->toArray()]);
    }
}