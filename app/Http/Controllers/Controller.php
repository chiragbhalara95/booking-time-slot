<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseError($msg='Error',$params = [], $responseKey = 'data') {
        return response()->json([
            'code' => -1,
            'msg' => $msg,
            $responseKey => $params
        ]);
    }

    public function responseSuccess($params = [], $msg="Success",$responseKey = 'data') {
        return response()->json([
            'code' => 0,
            'msg'  => $msg,
            $responseKey => $params
        ]);
    }

}
