@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@section('content')



<div class="col-12 mt-3 bg-dark">
    <form method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="h3 ml-1 pt-2">Editar Produto | {{$product->name}}</h2>
        <fieldset disabled>
            <div class="mb-3 form-group">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" placeholder={{$product->id}} value={{$product->id}}>
            </div>
        </fieldset>
        <div class="form-group mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group mb-3">
            <label for="price">Preço</label>
            <input type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="price" name="price" />
        </div>

        <label for="image">Imagem do produto</label>
        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image" >
              <label class="custom-file-label" for="image">Escolher arquivo</label>
            </div>
          </div>

          <div class="form-group mb-3">
            <label for="category_id">Selecione uma categoria</label>
            <select class="form-control" id="category_id" name="category_id">
              @foreach ($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" id="description" name="description">
          </div>

          <div class="row justify-content-end pb-3">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg mr-4">Editar</button>
              </div>
          </div>
    </form>
</div>

@endsection
