<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecrutadorRequest;
use App\Models\Recrutador;
use App\Services\Interfaces\EmpresaServiceInterface;
use App\Services\Interfaces\RecrutadorServiceInterface;
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

    public function index(Request $request){
        $recrutadores = $this->service->filterPaginate($request->search, $this->searchFields, 1);
        return view('admin.painel.recrutadores.recrutadores-list')->with(['recrutadores' => $recrutadores, 'request' => $request->all()]);
    }

    public function show($recrutador){
        $recrutador = $this->service->find($recrutador);
        return view('admin.painel.recrutadores.recrutadores-show')->with('recrutador', $recrutador);
    }

    public function create(){
        $empresas = $this->empresaService->all();
        return view('admin.painel.recrutadores.recrutadores-create')->with(['empresas' => $empresas]);
    }

    public function store(RecrutadorRequest $request){
        $recrutador = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Recrutador $recrutador){
        $empresas = $this->empresaService->all();
        return view('admin.painel.recrutadores.recrutadores-edit')->with(['recrutador' => $recrutador, 'empresas' => $empresas]);
    }

    public function update(RecrutadorRequest $request, Recrutador $recrutador){
        $result = $this->service->update($recrutador->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function findByEmpresa(Request $request){
        $recrutadores = $this->service->findByEmpresa($request->empresa);
        return json_encode($recrutadores);
    }

    public function destroy(Recrutador $recrutador){
        $recrutador->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
