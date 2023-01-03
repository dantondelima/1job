@extends('admin.layouts.admin')

@section('title', 'Criar vaga')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Recrutadores</h1>

    @include('inc.feedback')

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar vaga</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.vagas.store') }}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="titulo">Título<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="titulo" required name="titulo" placeholder="Exemplo titulo" value="{{old('titulo')}}">
                                        @if ($errors->has('titulo'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('titulo') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="regime_contratual">Regime contratual<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('regime_contratual') ? ' is-invalid' : '' }}" name="regime_contratual" id="regime_contratual" required>
                                            <option value="">Selecione o regime contratual</option>
                                            @foreach ($regimes as $i => $regime)
                                                <option value="{{ $i }}" {{ old('regime_contratual') == $i?"selected":"" }}>{{ $regime }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('regime_contratual'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('regime_contratual') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quantidade">Quantidade:<span class="small text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-user{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" id="quantidade" required name="quantidade" placeholder="3" value="{{old('quantidade')}}">
                                        @if ($errors->has('quantidade'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('quantidade') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="remuneracao">Remuneração<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('remuneracao') ? ' is-invalid' : '' }}" id="titulo" required name="remuneracao" placeholder="R$ 2000,00" value="{{old('remuneracao')}}">
                                        @if ($errors->has('remuneracao'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('remuneracao') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="modalidade">Modalidade<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('modalidade') ? ' is-invalid' : '' }}" name="modalidade" id="modalidade" required>
                                            <option value="">Selecione a modalidade</option>
                                            @foreach ($modalidades as $key => $modalidade)
                                                <option value="{{ $i }}"  {{ old('modalidade') == $i?"selected":"" }}>{{ $modalidade }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('modalidade'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('modalidade') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descricao">Descrição<span class="small text-danger">*</span></label>
                                        <br>
                                        <textarea name="descricao" id="descricao" class="form-control form-control-user{{ $errors->has('descricao') ? ' is-invalid' : '' }}" rows="3" placeholder="Descrição vaga" required>{{ old('descricao') }}</textarea>
                                        @if ($errors->has('descricao'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('descricao') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="area_id">Área<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('area_id') ? ' is-invalid' : '' }}" name="area_id" id="area_id" required>
                                            <option value="">Selecione a empresa</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}" {{ old('area_id') == $area->id? "selected":"" }}>{{ $area->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('area_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('area_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="empresa_id">Empresa<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id" required>
                                            <option value="">Selecione a empresa</option>
                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $empresa->id }}" {{ old('empresa_id') == $empresa->id? "selected":"" }}>{{ $empresa->razao_social }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('empresa_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('empresa_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="recrutador_id">Recrutador responsável<span class="small text-danger"></span></label>
                                        <select class="form-control form-control-user{{ $errors->has('recrutador_id') ? ' is-invalid' : '' }}" name="recrutador_id" id="recrutador_id" >
                                            <option value="">Selecione a empresa</option>
                                        </select>
                                        @if ($errors->has('recrutador_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('recrutador_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Status (clique para alterar):<span class="small text-danger"></span></label>
                                        <br>
                                        <input type="hidden" name="ativa" value="1" id="status-field">
                                        <input type="checkbox" checked data-toggle="toggle" data-on="Ativo" data-off="Inativo" data-onstyle="success" data-offstyle="danger" value="ativo" id="status">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Encerrada? (clique para alterar):<span class="small text-danger"></span></label>
                                        <br>
                                        <input type="hidden" name="encerrada" value="0" id="encerrada-field">
                                        <input type="checkbox" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="warning" data-offstyle="danger" value="nao" id="encerrada">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-6">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center">
                                    <button type="submit" class="btn btn-primary form-control" style="color:white">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#status').change(function() {
            if(!$(this).is(':checked')){
                $('#status-field').val(0);
            }
            else{
                $('#status-field').val(1);
            }
        })

        $('#encerrada').change(function() {
            if(!$(this).is(':checked')){
                $('#encerrada-field').val(0);
            }
            else{
                $('#encerrada-field').val(1);
            }
        });

        var empresa = "{{ old('empresa_id') }}";
        if(empresa != ""){
            buscaRecrutadores(empresa);
        }

        $('#empresa_id').change(function() {
            buscaRecrutadores($(this).val());
        });
    });

    function buscaRecrutadores(empresa){
            $('#recrutador_id').html("<option value=''>Carregando</option>");
            $.ajax({
                data: {
                    'empresa': empresa,
                    "_token": "{{ csrf_token() }}",
                    },
                type: 'GET',
                url: '{{ route("admin.recrutadors.lista_por_empresa") }}',
                success: function(response) {
                    var responseParseada = JSON.parse(response);
                    if(responseParseada.length != 0){
                        options = "<option value=''>Selecione o recrutador</option>";
                        $.each(responseParseada, function(key, val){
                            if(val.id == "{{ old('recrutador_id') }}")
                            {
                                options += '<option value="' + val.id + '" selected>' + val.nome + '</option>';
                            }
                            else
                            {
                                options += '<option value="' + val.id + '">' + val.nome + '</option>';
                            }
                        });

                    }
                    else{
                        options = "<option value=''>Empresa não possui recrutadores</option>";
                    }

                    $('#recrutador_id').html(options);
                }
            });
        }
</script>
@endsection
