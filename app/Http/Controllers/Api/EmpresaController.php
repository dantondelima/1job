<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Models\Empresa;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    private EmpresaServiceInterface $service;
    // private EnderecoServiceInterface $enderecoService;
    // private EstadoServiceInterface $estadoService;
    // private CidadeServiceInterface $cidadeService;

    private array $searchFields = [
        'nome_fantasia',
        'email',
        'cnpj',
        'razao_social'
    ];

    public function __construct(EmpresaServiceInterface $service, /*EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService */)
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

    public function show($empresa){
        try{
            $empresa = $this->service->findByEmail($empresa);
            if($empresa){
                $response = ResponseUtil::successResponse($empresa->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function store(EmpresaRequest $request){
        try{
            $empresa = $this->service->create($request->all())->toArray();
            $response = ResponseUtil::successCreatedResponse($empresa);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }

        return response()->json($response, $response['status_code']);
    }

    public function update(EmpresaRequest $request, $empresa){
        try{
            $result = $this->service->findByEmail($empresa);
            if($empresa){
                $result = $this->service->update($result->id, $request->all());
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
