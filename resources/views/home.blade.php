@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Bem-vindo a 1job!!</h1>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                            <img src="{{ asset('images\1-job.png') }}" alt="">
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
