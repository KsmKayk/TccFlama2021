@extends('dev/head')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="fw-bold">Área de Testes</h1>
        <p class="lead mb-4">Você entrou numa área protegida pelo login basico!</p>
        <p>Bem vindo(a) {{$user->name}}</p>
        <a href="/signout">Sair</a>
</div>
@endsection
