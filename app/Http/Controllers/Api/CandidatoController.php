<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\CandidatoRequest;
use App\Models\Candidato;
use App\Services\Interfaces\CandidatoServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    private CandidatoServiceInterface $service;
    // private EnderecoServiceInterface $enderecoService;
    // private EstadoServiceInterface $estadoService;
    // private CidadeServiceInterface $cidadeService;

    private array $searchFields = [
        'nome',
        'email',
        'cpf',
    ];

    public function __construct(CandidatoServiceInterface $service, /*EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService */)
    {
        $this->service = $service;
        // $this->enderecoService = $enderecoService;
        // $this->estadoService = $estadoService;
        // $this->cidadeService = $cidadeService;
    }

    public function login(LoginRequest $request)
    {
        try{
            $response = $this->service->gerarToken($request->all());
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }
        return response()->json($response, $response['status_code']);
    }

    public function show($candidato){
        try{
            $candidato = $this->service->findByEmail($candidato);
            if($candidato){
                $response = ResponseUtil::successResponse($candidato->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function store(CandidatoRequest $request){
        try{
            $candidato = $this->service->create($request->all())->toArray();
            $response = ResponseUtil::successCreatedResponse($candidato);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }

        return response()->json($response, $response['status_code']);
    }

    public function update(CandidatoRequest $request, Candidato $candidato){
        try{
            if($candidato){
                $result = $this->service->update($candidato->id, $request->all());
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
