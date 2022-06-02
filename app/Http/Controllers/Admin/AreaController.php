<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Services\Interfaces\AreaServiceInterface;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private AreaServiceInterface $service;
    private array $searchFields = [
        'nome',
    ];

    public function __construct(AreaServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){
        $areas = $this->service->filterPaginate($request->busca, $this->searchFields, 10);
        return view('admin.painel.areas.areas-list')->with(['areas' => $areas, 'request' => $request->all()]);
    }

    public function show(Area $area){
        return view('admin.painel.areas.areas-show')->with('area', $area);
    }

    public function create(){
        return view('admin.painel.areas.areas-create');
    }

    public function store(AreaRequest $request){
        $area = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Area $area){
        return view('admin.painel.areas.areas-edit')->with('area', $area);
    }

    public function update(AreaRequest $request, Area $area){
        $area = $this->service->update($area->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Area $area){
        $area->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
