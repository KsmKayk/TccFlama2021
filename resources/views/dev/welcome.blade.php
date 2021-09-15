@extends('dev/head')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="fw-bold">Área de Testes</h1>
    <div class="">
        <p class="lead mb-4">Login e Cadastro para poder acessar a Área de ADM</p>
        <div class="d-flex justify-content-around">
            <a href="/signin" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
            <a href="/signup" class="btn btn-outline-secondary btn-lg px-4">Cadastro</a>
        </div>
    </div>
</div>
@endsection
