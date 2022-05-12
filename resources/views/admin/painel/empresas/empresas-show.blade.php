@extends('admin.layouts.admin')

@section('title', 'Visualizar empresa')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Empresa - {{ $empresa->razao_social }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visualizar empresa</h6>
                </div>

                <div class="card-body">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Razão social:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $empresa->razao_social }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Nome fantasia:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $empresa->nome_fantasia }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        CNPJ:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $empresa->cnpj }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Email:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $empresa->email }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Status:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $empresa->ativo == 1?"Ativo":"Inativo" }}</div>
                    <hr class="sidebar-divider mb-1">
                </div>

                <!-- Button -->
                <div class="pl-lg-6 mb-4 ml-4">
                    <div class="row ">
                        <div class="col-lg-5">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
