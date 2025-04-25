<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CnnDetailService;

class CnnDetailController extends Controller
{
    protected $api;
    public function __construct(CnnDetailService $api)
    {
        $this->api = $api;
    }

    public function getDetail()
    {
        return response()->json($this->api->getDetailBerita());
    }
}
