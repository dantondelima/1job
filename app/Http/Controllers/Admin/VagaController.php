<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use App\Services\Interfaces\AreaServiceInterface;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\VagaServiceInterface;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    private VagaServiceInterface $service;
    private EmpresaServiceInterface $empresaService;
    private AreaServiceInterface $areaService;

    private array $searchFields = [
        'titulo',
        'regime_contratual',
        'quantidade',
        'remuneracao',
        'modalidade',
        'descricao',
    ];

    public function __construct(VagaServiceInterface $service, EmpresaServiceInterface $empresaService, AreaServiceInterface $areaService)
    {
        $this->service = $service;
        $this->empresaService = $empresaService;
        $this->areaService = $areaService;
    }

    public function index(Request $request){
        $vagas = $this->service->filterPaginate($request->search, $this->searchFields, 1);
        return view('admin.painel.vagas.vagas-list')->with(['vagas' => $vagas, 'request' => $request->all()]);
    }

    public function show($vaga){
        $vaga = $this->service->findWithRelations($vaga);
        return view('admin.painel.vagas.vagas-show')->with('vaga', $vaga);
    }

    public function create(){
        $empresas = $this->empresaService->all();
        $areas = $this->areaService->all();
        return view('admin.painel.vagas.vagas-create')->with(['empresas' => $empresas, 'areas' => $areas]);
    }

    public function store(VagaRequest $request){
        $vagas = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Vaga $vaga){
        $empresas = $this->empresaService->all();
        $areas = $this->areaService->all();
        return view('admin.painel.vagas.vagas-edit')->with(['vaga' => $vaga, 'empresas' => $empresas, 'areas' => $areas]);
    }

    public function update(VagaRequest $request, Vaga $vaga){
        $result = $this->service->update($vaga->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Vaga $vaga){
        $vaga->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
