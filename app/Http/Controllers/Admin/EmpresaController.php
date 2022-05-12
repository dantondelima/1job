<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Services\Interfaces\CidadeServiceInterface;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\EnderecoServiceInterface;
use App\Services\Interfaces\EstadoServiceInterface;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    private EmpresaServiceInterface $service;
    private EnderecoServiceInterface $enderecoService;
    private EstadoServiceInterface $estadoService;
    private CidadeServiceInterface $cidadeService;

    private array $searchFields = [
        'nome_fantasia',
        'email',
        'cnpj',
        'razao_social'
    ];

    public function __construct(EmpresaServiceInterface $service, EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService)
    {
        $this->service = $service;
        $this->enderecoService = $enderecoService;
        $this->estadoService = $estadoService;
        $this->cidadeService = $cidadeService;
    }

    public function index(Request $request){
        $empresas = $this->service->filterPaginate($request->search, $this->searchFields, 1);
        return view('admin.painel.empresas.empresas-list')->with(['empresas' => $empresas, 'request' => $request->all()]);
    }

    public function show($empresa){
        $empresa = $this->service->find($empresa);
        return view('admin.painel.empresas.empresas-show')->with('empresa', $empresa);
    }

    public function create(){
        // $estados = $this->estadoService->all();
        // $cidades = $this->cidadeService->all();
        return view('admin.painel.empresas.empresas-create')/*->with(['estados' => $estados, 'cidades' => $cidades])*/;
    }

    public function store(EmpresaRequest $request){
        $empresa = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Empresa $empresa){
        return view('admin.painel.empresas.empresas-edit')->with('empresa', $empresa);
    }

    public function update(AdminRequest $request, Empresa $empresa){
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
