<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\AreaServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private AreaServiceInterface $service;

    private array $searchFields = [
        'nome',
    ];

    public function __construct(AreaServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(){
        try{
            $areas = $this->service->all();
            if($areas){
                $response = ResponseUtil::successResponse($areas->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }
}
