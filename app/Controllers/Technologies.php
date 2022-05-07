<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class Technologies extends BaseController
{
    public function index()
    {
        return view('pages/technologies', ['technologies' => $this->apiGet()]);
    }

    private function apiGet()
    {
        $http = Services::curlrequest();
        $res = $http->get('http://devel.crissad.com/api/nvidia');
        $json = $res->getBody();
        return json_decode($json, true);
    }
}
