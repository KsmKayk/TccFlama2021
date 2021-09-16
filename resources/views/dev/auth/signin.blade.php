@extends('dev/head')

@section('content')
@include('error', ['errors' => $errors])
<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="fw-bold">Área de Login</h1>
    <div class="">
        <p class="lead mb-4">Login para poder acessar a Área de ADM</p>
        <div>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

                  <div class="d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary px-5 gap-3 mt-2">Entrar</button>
                    <a href="/signup" class="btn btn-outline-secondary px-2 mt-1">
                        Registrar-se
                    </a>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
