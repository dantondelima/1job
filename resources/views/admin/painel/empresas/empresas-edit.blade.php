@extends('admin.layouts.admin')

@section('title', 'Editar empresa')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Empresa - {{ $empresa->razao_social }}</h1>

    @include('inc.feedback')

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Editar empresa</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.empresas.update', ['empresa' => $empresa->id]) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="razao_social">Razão social<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" id="razao_social" required name="razao_social" placeholder="Exemplo razão social" value="{{ $empresa->razao_social }}">
                                        @if ($errors->has('razao_social'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('razao_social') }}</strong>
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
                                        <label class="form-control-label" for="nome_fantasia">Nome fantasia<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('nome_fantasia') ? ' is-invalid' : '' }}" id="nome_fantasia" required name="nome_fantasia" placeholder="Exemplo nome fantasia" value="{{ $empresa->nome_fantasia }}">
                                        @if ($errors->has('nome_fantasia'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('nome_fantasia') }}</strong>
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
                                        <label class="form-control-label" for="cnpj">CNPJ<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" id="cnpj" required name="cnpj" placeholder="00.000.000/0000-00" value="{{ $empresa->cnpj }}">
                                        @if ($errors->has('cnpj'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('cnpj') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">CEP<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('cep') ? ' is-invalid' : '' }}" id="cep" required name="cep" placeholder="00000-000" value="{{old('cep')}}">
                                        @if ($errors->has('cep'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Estado<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" name="estado_id" id="estado_id" readonly>
                                            <option value="">Digite o CEP</option>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id }}">{{ $estado->sigla }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('estado_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('estado_id') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Cidade<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('cidade_id') ? ' is-invalid' : '' }}" name="cidade_id" id="cidade_id" readonly>
                                            <option value="">Digite o CEP</option>
                                        </select>
                                        @if ($errors->has('cidade_id'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('cidade_id') }}</strong>
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
                                        <label class="form-control-label" for="nome">Bairro<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('bairro') ? ' is-invalid' : '' }}" id="bairro" required name="bairro" placeholder="bairro exemplo" value="{{old('bairro')}}" readonly>
                                        @if ($errors->has('bairro'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('bairro') }}</strong>
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
                                        <label class="form-control-label" for="nome">Rua<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('rua') ? ' is-invalid' : '' }}" id="rua" required name="rua" placeholder="rua exemplo" value="{{old('rua')}}" readonly>
                                        @if ($errors->has('rua'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('rua') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Número<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('numero') ? ' is-invalid' : '' }}" id="numero" required name="numero" placeholder="123" value="{{old('numero')}}">
                                        @if ($errors->has('numero'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Complemento<span class="small text-danger"></span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('complemento') ? ' is-invalid' : '' }}" id="complemento" name="complemento" placeholder="complemento exemplo" value="{{old('complemento')}}">
                                        @if ($errors->has('complemento'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('complemento') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" required name="email" placeholder="exemplo@1job.com.br" value="{{ $empresa->email }}">
                                        @if ($errors->has('email'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
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
                                        <label class="form-control-label" for="nome">Senha (preencha apenas se deseja alterar)</label>
                                        <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Digite sua senha">
                                        @if ($errors->has('password'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
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
                                        <label class="form-control-label" for="nome">Confirmar senha (preencha apenas se deseja alterar)</label>
                                        <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha">
                                        @if ($errors->has('password'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
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
                                        <input type="hidden" name="ativo" value="1" id="status-field">
                                        <input type="checkbox" checked data-toggle="toggle" data-on="Ativo" data-off="Inativo" data-onstyle="success" data-offstyle="danger" value="ativo" id="status">
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
        status = "{{ $empresa->ativo }}";

        if(status == 1){
            $('#status').prop('checked', true).trigger('change');
        }
        else{
            $('#status').prop('checked', false).trigger('change');
        }

        $('#status').change(function() {
            if(!$(this).is(':checked')){
                $('#status-field').val(0);
            }
            else{
                $('#status-field').val(1);
            }
        })
    });
</script>
@endsection
