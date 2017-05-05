<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 04/05/2017
 * Time: 12:39
 */

namespace App\Utilities;


use DB;

class FunctionsUtilities
{
    public static function SaveEvent($resource, $params)
    {

        $params = array(
            'ename' => isset($params['ename']) && !empty($params['ename']) ? $params['ename'] : 0,
            'evenue' => isset($params['evenue']) && !empty($params['evenue']) ? $params['evenue'] : 0,
            'tfrom' => isset($params['tfrom']) && !empty($params['tfrom']) ? $params['tfrom'] : 0,
            'tto' => isset($params['tto']) ? strtoupper($params['tto']) : null,
            'des' => isset($params['des']) ? strtoupper($params['des']) : null,
            'time' => isset($params['time']) ? strtoupper($params['time']) : null,
        );


        $execQuery = self::ExecQuery($resource, $params);

        return $execQuery;



    }

    private static function ExecQuery($resource, $params)
    {
        return DB::table($resource)->insertGetID($params);
    }

    public static function UpdateEvent($resource, $params,$resource_id)
    {

        return DB::table($resource)->where('event_idm',$resource_id)->update($params);
    }

    public static function SaveEventGoer($resource, $params)
    {
        return DB::table($resource)->insertGetID($params);
    }

    public static function UpdateEventGoer($resource, $params, $resource_id)
    {
        return DB::table($resource)->where('r_id',$resource_id)->update($params);
    }
}