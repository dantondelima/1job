<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
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
        'nome',
        'email',
    ];

    public function __construct(EmpresaServiceInterface $service, EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService)
    {
        $this->service = $service;
        $this->enderecoService = $enderecoService;
        $this->estadoService = $estadoService;
        $this->cidadeService = $cidadeService;
    }

    public function index(Request $request){
        $admins = $this->service->filterPaginate($request->busca, $this->searchFields, 1);
        return view('admin.painel.admins.admins-list')->with(['admins' => $admins, 'request' => $request->all()]);
    }

    public function show($empresa){
        $empresa = $this->service->find($empresa);
        return view('admin.painel.admins.admins-show')->with('empresa', $empresa);
    }

    public function create(){
        return view('admin.painel.admins.admins-create');
    }

    public function store(AdminRequest $request){
        $result = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Admin $admin){
        return view('admin.painel.admins.admins-edit')->with('admin', $admin);
    }

    public function update(AdminRequest $request, Admin $admin){
        $result = $this->service->update($admin->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Admin $admin){
        if($admin->id == 1)
            return back()->with('error', 'Você não pode excluir o super admin');
        $admin->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
