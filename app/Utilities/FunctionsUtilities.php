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

    public static function UpdateEvent($resource, $params, $resource_id)
    {

        return DB::table($resource)->where('event_idm', $resource_id)->update($params);
    }

    public static function SaveEventGoer($resource, $params)
    {
        return DB::table($resource)->insertGetID($params);
    }

    public static function UpdateEventGoer($resource, $params, $resource_id)
    {
        return DB::table($resource)->where('r_id', $resource_id)->update($params);
    }

    public static function fetchList($table, $pageSize = null, $offset = null, $all = null)
    {

        $responceCollection = collect([]);

        $iTotal = DB::table($table)->count();
        if (isset($all)) {
            $results = DB::table($table)->get();
        } else if (isset($pageSize) && !empty($offset)) {

            $results = DB::table($table)->skip($offset)->take($pageSize)->get();
        } else {
            $results = DB::table($table)->skip(0)->take(10)->get();

        }
        $iFilteredTotal = count($results);


        $responceCollection->put('iTotal', $iTotal);
        $responceCollection->put('iFilteredTotal', $iFilteredTotal);
        $responceCollection->put('results', $results);


        return $responceCollection;


    }

    public static function SavePrayer($resource, $params)
    {
        $params = array(
            'prayer_id' => isset($params['prayer_id']) && !empty($params['prayer_id']) ? $params['prayer_id'] : 0,
            'about' => isset($params['about']) && !empty($params['about']) ? $params['about'] : 0,
            'description' => isset($params['description']) && !empty($params['description']) ? $params['description'] : 0,
            'prayer_type' => isset($params['prayer_type']) && !empty($params['prayer_type']) ? $params['prayer_type'] : 0,
            'time' => isset($params['time']) && !empty($params['time']) ? $params['time'] : 0,
            'user' => isset($params['user']) && !empty($params['user']) ? $params['user'] : 0,
            'prayedby' => isset($params['prayedby']) && !empty($params['prayedby']) ? $params['prayedby'] : 0,
            'status' => isset($params['status']) && !empty($params['status']) ? $params['status'] : 0,

        );
        $execQuery = self::ExecQuery($resource, $params);

        return $execQuery;

    }

    public static function UpdatePrayer($resource, $params, $resource_id)
    {
        return DB::table($resource)->where('prayer_id', $resource_id)->update($params);

    }

    public static function SavePreaching($resource, $params)
    {
        $params = array(
            'preaching_id' => isset($params['preaching_id']) && !empty($params['preaching_id']) ? $params['preaching_id'] : 0,
            'title' => isset($params['title']) && !empty($params['title']) ? $params['title'] : 0,
            'preached_on' => isset($params['preached_on']) && !empty($params['preached_on']) ? $params['preached_on'] : 0,
            'by' => isset($params['by']) && !empty($params['by']) ? $params['by'] : 0,
            'streams' => isset($params['streams']) && !empty($params['streams']) ? $params['streams'] : 0,
            'downloads' => isset($params['downloads']) && !empty($params['downloads']) ? $params['downloads'] : 0,
            'likes' => isset($params['likes']) && !empty($params['likes']) ? $params['likes'] : 0,

        );
        $execQuery = self::ExecQuery($resource, $params);

        return $execQuery;
    }

    public static function UpdatePreaching($resource, $params, $resource_id)
    {
        return DB::table($resource)->where('preaching_id', $resource_id)->update($params);

    }
}