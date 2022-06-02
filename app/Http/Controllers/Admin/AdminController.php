<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminServiceInterface $service;
    private array $searchFields = [
        'nome',
        'email',
    ];

    public function __construct(AdminServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){
        $admins = $this->service->filterPaginate($request->busca, $this->searchFields, 10);
        return view('admin.painel.admins.admins-list')->with(['admins' => $admins, 'request' => $request->all()]);
    }

    public function show(Admin $admin){
        return view('admin.painel.admins.admins-show')->with('admin', $admin);
    }

    public function create(){
        return view('admin.painel.admins.admins-create');
    }

    public function store(AdminRequest $request){
        $admin = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Admin $admin){
        return view('admin.painel.admins.admins-edit')->with('admin', $admin);
    }

    public function update(AdminRequest $request, Admin $admin){
        $admin = $this->service->update($admin->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Admin $admin){
        if($admin->id == 1)
            return back()->with('error', 'Você não pode excluir o super admin');
        $admin->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
