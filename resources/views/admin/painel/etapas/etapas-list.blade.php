@extends('admin.layouts.admin')

@section('title', 'Etapas - '.$vaga->titulo)

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Etapas - {{ $vaga->titulo }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h6 class="m-0 font-weight-bold text-primary">Gerenciamento de etapas</h6>
            </div>
            <div class="col-5"></div>
            <div class="col-2">
                <a href="#" id="salvarOrdemEtapas" class="btn btn-success" title="Salvar ordem das etapas">
                    <i class="fas fa-check"></i> Salvar ordem
                </a>
            </div>
            <div class="col-md-2 col-xs-12">
                    <a class="btn btn-primary form-control" href="{{ route('admin.vagas.etapa-processo.create', ['vaga' => $vaga->id]) }}" style="color:white">Criar nova</a>
            </div>
        </div>
    </div>
    <div class="card-body" id="feedback">
        {{-- <form method="get" action="" class="form form-horizontal">
            <div class="form-group row">
                <div class="col-md-8">
                </div>
                <div class="col-md-3 col-xs-12">
                    <input type="text" class="form-control" name="search" value="{{ isset($request['search'])?$request['search']:'' }}" placeholder="Buscar">
                </div>
                <div class="col-md-1 col-xs-12">
                    <button type="submit" class="btn btn-primary form-control" style="color:white"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form> --}}
        <div class="table-responsive">
            @include('inc.feedback')
            <table class="table table-bordered datatable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th style="text-align:center" colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @forelse ($vaga->etapas as $etapa)
                        <tr id="{{ $etapa->id }}">
                            <td class="">{{$etapa->id}}</td>
                            <td  class="col-md-4">{{$etapa->nome}}</td>
                            <td  class="col-md-4">{{ substr($etapa->descricao, 1, 100) }}</td>
                            <td  class="col-md-4">{{ $etapa->ativa?"Ativa":"Inativa" }}</td>
                            <td class="col-md-1"><a role="button" href="{{ route('admin.vagas.etapa-processo.show', ['vaga' => $vaga, 'etapa_processo' => $etapa->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-eye"></i></a></td>
                            <td class="col-md-1"><a role="button" href="{{ route('admin.vagas.etapa-processo.edit', ['vaga' => $vaga, 'etapa_processo' => $etapa->id])}}" class="btn btn-primary btn-user btn-block"> <i class="fa fa-edit"></i></a></td>
                            <td class="col-md-1">
                                <form action="{{ route("admin.vagas.etapa-processo.destroy", ['vaga' => $vaga,'etapa_processo' => $etapa->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-user btn-block classe-deletar"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="font-size:25px;" colspan="5"><b>Nenhuma etapa encontrada</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
<link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" href="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" href="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    var sortableEtapa = [];
    function salvarOrdenacao(event, ui)
    {
        sortableEtapa = [];
        $('#sortable').children('tr').each(function(key, value) {
            sortableEtapa.push(value.id);
        });
    }
    $(document).ready(function(){
        $('#sortable').sortable({
            update: function(event, ui) {
                salvarOrdenacao(event, ui);
            }
        });

        $('#salvarOrdemEtapas').click(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('admin.etapas.salva.ordenacao')}}",
                headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' },
                type: 'POST',
                data: {
                    etapas: sortableEtapa
                },
                success: function(data){
                    if(data = 'Sucesso'){
                        alert('Ordem atualizada com sucesso');
                        location.reload();
                    }
                }
            })
        });

        $('select[data-id]').on('change', function(){
            var id =  $(this).data('id');
            url = $(this).data('url');
            $.ajax({
                'url': url,
                'method': 'post',
                'data':   {
                    '_token': '{{csrf_token()}}',
                    'status': $(this).val(),
                }
            }).done( function(data){
                $('#feedback').prepend("<div class='alert alert-success alert-dismissible show'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Status atualizado com sucesso</strong></div>");
            });
        });
    });
</script>
@endsection
@stop
