<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtapaProcessoRequest;
use App\Models\EtapaProcesso;
use App\Services\Interfaces\EtapaProcessoServiceInterface;
use App\Services\Interfaces\VagaServiceInterface;
use Illuminate\Http\Request;

class EtapasProcessoController extends Controller
{
    private EtapaProcessoServiceInterface $service;
    private VagaServiceInterface $vagaService;

    private array $searchFields = [
        'nome',
        'descricao',
    ];

    public function __construct(EtapaProcessoServiceInterface $service, VagaServiceInterface $vagaService)
    {
        $this->service = $service;
        $this->vagaService = $vagaService;
    }

    public function index($vaga){
        $vaga = $this->vagaService->find($vaga);
        return view('admin.painel.etapas.etapas-list')->with(['vaga' => $vaga]);
    }

    public function show($vaga, $etapa_processo){
        $etapa = $this->service->find($etapa_processo);
        $vaga = $this->vagaService->find($vaga);
        return view('admin.painel.etapas.etapas-show')->with(['vaga' => $vaga, 'etapa' => $etapa]);
    }

    public function create($vaga){
        return view('admin.painel.etapas.etapas-create')->with('vaga', $vaga);
    }

    public function store(EtapaProcessoRequest $request){
        $etapa = $this->service->last();
        if(!$etapa){
            $ordem = 1;
        }
        else{
            $ordem = $etapa->ordem;
        }
        $request['ordem'] = $ordem + 1;
        $etapa = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function salvaOrdem(Request $request){
        foreach($request->etapas as $ordem => $etapa){
            $this->service->update($etapa, ['ordem' => $ordem+1]);
        }
        return 'Sucesso';
    }

    public function edit($vaga, EtapaProcesso $etapa_processo){
        $etapa = $this->service->find($etapa_processo->id);
        return view('admin.painel.etapas.etapas-edit')->with(['vaga' => $vaga, 'etapa' => $etapa]);
    }

    public function update(EtapaProcessoRequest $request, $vaga, $etapa_processo){
        dd($request->all(), $vaga, $etapa_processo);
        $result = $this->service->update($etapa_processo, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(EtapaProcesso $etapa_processo){
        $etapa_processo->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
