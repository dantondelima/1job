<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatoRequest;
use App\Models\Candidato;
use App\Services\Interfaces\CandidatoServiceInterface;
use App\Services\Interfaces\CidadeServiceInterface;
use App\Services\Interfaces\EnderecoServiceInterface;
use App\Services\Interfaces\EstadoServiceInterface;
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

    public function __construct(CandidatoServiceInterface $service, EnderecoServiceInterface $enderecoService, EstadoServiceInterface $estadoService, CidadeServiceInterface $cidadeService)
    {
        $this->service = $service;
        $this->enderecoService = $enderecoService;
        $this->estadoService = $estadoService;
        $this->cidadeService = $cidadeService;
    }

    public function index(Request $request){
        $candidatos = $this->service->filterPaginate($request->search, $this->searchFields, 1);
        return view('admin.painel.candidatos.candidatos-list')->with(['candidatos' => $candidatos, 'request' => $request->all()]);
    }

    public function show($candidato){
        $candidato = $this->service->find($candidato);
        return view('admin.painel.candidatos.candidatos-show')->with('candidato', $candidato);
    }

    public function create(){
        // $estados = $this->estadoService->all();
        // $cidades = $this->cidadeService->all();
        return view('admin.painel.candidatos.candidatos-create')/*->with(['estados' => $estados, 'cidades' => $cidades])*/;
    }

    public function store(CandidatoRequest $request){
        $candidato = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Candidato $candidato){
        return view('admin.painel.candidatos.candidatos-edit')->with('candidato', $candidato);
    }

    public function update(CandidatoRequest $request, Candidato $candidato){
        $result = $this->service->update($candidato->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Candidato $candidato){
        $candidato->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
