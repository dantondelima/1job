@extends('admin.layouts.admin')

@section('title', 'Criar recrutador')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Recrutadores</h1>

    @include('inc.feedback')

    <div class="row justify-content-center">

        <div class="col-lg-9 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Criar recrutador</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.recrutadors.store') }}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="razao_social">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('nome') ? ' is-invalid' : '' }}" id="nome" required name="nome" placeholder="Exemplo nome" value="{{old('nome')}}">
                                        @if ($errors->has('nome'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('nome') }}</strong>
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
                                        <label class="form-control-label" for="cpf">CPF<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user{{ $errors->has('cpf') ? ' is-invalid' : '' }}" id="cpf" required name="cpf" placeholder="000.000.000-00" value="{{old('cpf')}}">
                                        @if ($errors->has('cpf'))
                                            <small class="text-danger" role="alert">
                                                <strong>{{ $errors->first('cpf') }}</strong>
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
                                        <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" required name="email" placeholder="exemplo@1job.com.br" value="{{old('email')}}">
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
                                        <label class="form-control-label" for="nome">Senha<span class="small text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" required name="password" placeholder="Digite sua senha">
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
                                        <label class="form-control-label" for="nome">Confirmar senha<span class="small text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password_confirmation" required name="password_confirmation" placeholder="Confirme sua senha">
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
                                        <label class="form-control-label" for="nome">Empresa<span class="small text-danger">*</span></label>
                                        <select class="form-control form-control-user{{ $errors->has('empresa_id') ? ' is-invalid' : '' }}" name="empresa_id" id="empresa_id" >
                                            <option value="">Selecione a empresa</option>
                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $empresa->id }}">{{ $empresa->razao_social }}</option>
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
