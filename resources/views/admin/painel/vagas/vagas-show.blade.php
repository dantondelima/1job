@extends('admin.layouts.admin')

@section('title', 'Visualizar vaga')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vaga - {{ $vaga->titulo }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visualizar vaga</h6>
                </div>

                <div class="card-body">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Título:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->titulo }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 font-weight-bold text-primary text-uppercase mb-1">
                        Regime contratual:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->regime_contratual }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Quantidade:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->quantidade }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Remuneração:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->remuneracao }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Modalidade:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->modalidade }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Descrição:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->descricao }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Empresa:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->empresa->razao_social }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                        Área:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->area->nome }}</div>
                    <hr class="sidebar-divider mb-1">
                    @if ($vaga->recrutador_id != null)
                        <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-1">
                            Recrutador responsável:
                        </div>
                        <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->recrutador->nome }}</div>
                        <hr class="sidebar-divider mb-1">
                    @endif
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Status:
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->ativa == 1?"Ativa":"Inativa" }}</div>
                    <hr class="sidebar-divider mb-1">
                    <div class="h5 ml-3 mt-2 font-weight-bold text-primary text-uppercase mb-3">
                        Encerrada?
                    </div>
                    <div class="h5 ml-5 font-weight-bold text-gray-800 mb-3">{{ $vaga->encerrada == 1?"Sim":"Não" }}</div>
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
