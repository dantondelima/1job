@extends('admin.layouts.admin')

@section('title', 'Visualizar recrutador')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Recrutador - {{ $recrutador->nome }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visualizar recrutador</h6>
                </div>

                <div class="card-body">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Nome:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->nome }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        CPF:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->cpf }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Email:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->email }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Empresa:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->empresa->razao_social }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Status:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->ativo == 1?"Ativo":"Inativo" }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Confirmado?
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $recrutador->confirmado == 1?"Sim":"Não" }}</div>
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
