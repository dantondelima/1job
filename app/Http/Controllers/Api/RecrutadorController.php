<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RecrutadorRequest;
use App\Models\Recrutador;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\RecrutadorServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class RecrutadorController extends Controller
{
    private RecrutadorServiceInterface $service;
    private EmpresaServiceInterface $empresaService;

    private array $searchFields = [
        'nome',
        'email',
        'cpf',
    ];

    public function __construct(RecrutadorServiceInterface $service, EmpresaServiceInterface $empresaService)
    {
        $this->service = $service;
        $this->empresaService = $empresaService;
    }

    public function index($empresa){
        try{
            $recrutadores = $this->empresaService->find($empresa)->recrutadores;
            if($recrutadores){
                $response = ResponseUtil::successResponse($recrutadores->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function show($recrutador){
        try{
            $recrutador = $this->service->find($recrutador);
            if($recrutador){
                $response = ResponseUtil::successResponse($recrutador->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function store(RecrutadorRequest $request){
        try{
            $recrutador = $this->service->create($request->all())->toArray();
            $response = ResponseUtil::successCreatedResponse($recrutador);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }

        return response()->json($response, $response['status_code']);
    }

    public function update(RecrutadorRequest $request, Recrutador $recrutador){
        try{
            if($recrutador){
                $result = $this->service->update($recrutador->id, $request->all());
                $response = ResponseUtil::successUpdatedResponse($result);
                return response()->json($response, $response['status_code']);
            }
            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }
        return response()->json($response, $response['status_code']);
    }

    public function destroy($id){
        try{
            $result = $this->service->delete($id);
            $response = ResponseUtil::successDeletedResponse($result);
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }

        return response()->json($response, $response['status_code']);
    }
}
