<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminServiceInterface $service;

    public function __construct(AdminServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(){
        $admins = $this->service->all();
        return view('admin.painel.admins.admins-list')->with('admins', $admins);
    }

    public function show(Admin $admin){
        return view('admin.painel.admins.show-admins')->with('admin', $admin);
    }

    public function create(){
        return view('admin.painel.admins.create-admins');
    }

    public function store(AdminRequest $request){
        $result = $this->service->create($request->all());
        return back()->with('success', 'Registro criado com sucesso');
    }

    public function edit(Admin $admin){
        return view('admin.painel.admins.edit-admins')->with('admin', $admin);
    }

    public function update(AdminRequest $request, Admin $admin){
        $result = $this->service->update($admin->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }

    public function destroy(Admin $admin){
        $admin->delete();
        return back()->with('success', 'Registro excluído com sucesso');
    }
}
