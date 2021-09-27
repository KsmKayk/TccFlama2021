@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@section('content')



<div class="col-12 mt-3 bg-dark">
    <form method="POST">
        @csrf
        <h2 class="h3 ml-1 pt-2">Adicionar Produto</h2>
        <div class="form-group mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group mb-4">
            <label for="price">Price</label>
            <input type="price" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="price" name="price" />
        </div>

        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input form-control" id="image" name="image">
            <label class="custom-file-label" for="image">Escolha uma imagem</label>
          </div>

          <div class="form-group mb-3">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" id="description" name="description">
          </div>

          <div class="row justify-content-end pb-3">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg mr-4">Adicionar</button>
              </div>
          </div>
    </form>
</div>

@endsection


