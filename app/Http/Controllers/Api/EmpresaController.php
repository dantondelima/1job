<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaRequest;
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

    public function show($empresa){
        try{
            $empresa = $this->service->find($empresa)->toArray();
            $response = ResponseUtil::successResponse($empresa);
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

    public function update(EmpresaRequest $request, Empresa $empresa){
        $result = $this->service->update($empresa->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Admin $admin){
        if($admin->id == 1)
            return back()->with('error', 'Você não pode excluir o super admin');
        $admin->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
