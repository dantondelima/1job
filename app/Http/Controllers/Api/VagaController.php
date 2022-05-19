<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VagaRequest;
use App\Models\Vaga;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\VagaServiceInterface;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    private VagaServiceInterface $service;
    private EmpresaServiceInterface $empresaService;

    private array $searchFields = [
        'nome_fantasia',
        'email',
        'cnpj',
        'razao_social'
    ];

    public function __construct(VagaServiceInterface $service, EmpresaServiceInterface $empresaService/*EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService */)
    {
        $this->service = $service;
        $this->empresaService = $empresaService;
        // $this->enderecoService = $enderecoService;
        // $this->estadoService = $estadoService;
        // $this->cidadeService = $cidadeService;
    }

    public function index($empresa){
        try{
            $vagas = $this->empresaService->find($empresa)->vagas;
            if($vagas){
                $response = ResponseUtil::successResponse($vagas->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function show($vaga){
        try{
            $vaga = $this->service->find($vaga);
            if($vaga){
                $response = ResponseUtil::successResponse($vaga->toArray());
                return response()->json($response, $response['status_code']);
            }

            $response = ResponseUtil::notFoundResponse();
        }catch (\Exception $ex){
            $response = ResponseUtil::notFoundResponse();
        }
        return response()->json($response, $response['status_code']);
    }

    public function store(VagaRequest $request){
        try{
            $vaga = $this->service->create($request->all())->toArray();
            $response = ResponseUtil::successCreatedResponse($vaga);
        }catch (\Exception $ex){
            $response = ResponseUtil::errorResponse($ex);
        }

        return response()->json($response, $response['status_code']);
    }

    public function update(VagaRequest $request, Vaga $vaga){
        try{
            if($vaga){
                $result = $this->service->update($vaga->id, $request->all());
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
