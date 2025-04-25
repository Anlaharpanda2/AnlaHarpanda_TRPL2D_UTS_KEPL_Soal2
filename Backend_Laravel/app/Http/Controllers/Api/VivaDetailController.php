<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VivaDetailService;

class VivaDetailController extends Controller
{
    protected $api;
    public function __construct(VivaDetailService $api)
    {
        $this->api = $api;
    }

    public function getDetail()
    {
        return response()->json($this->api->getDetailBerita());
    }
}
