<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 08/05/2017
 * Time: 09:43
 */


namespace App\Utilities;


use App\Event;
use App\Preaching;
use Illuminate\Support\Facades\Storage;

class FileUtilities
{

    public static function storeFile($resource, $id,$file,$filename)
    {
        //validate model model exists
        $models = [
            'events' => Event::class,
            'preachings' => Preaching::class,


        ];

        $model = $models[$resource]::findOrFail($id);

        //store file
        Storage::put("$resource/$filename", file_get_contents($file));
    }
}