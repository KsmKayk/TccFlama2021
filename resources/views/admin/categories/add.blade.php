@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@section('content')



<div class="col-12 mt-3 bg-dark">
    <form method="POST">
        @csrf
        <h2 class="h3 ml-1 pt-2">Adicionar Categoria</h2>
        <div class="form-group mb-3">
            <label for="name">Digite o nome</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>

          <div class="row justify-content-end pb-3">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg mr-4">Adicionar</button>
              </div>
          </div>
    </form>
</div>

@endsection


