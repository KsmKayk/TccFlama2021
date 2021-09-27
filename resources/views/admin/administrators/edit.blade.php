@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@section('content')



<div class="col-12 mt-3 bg-dark">
    <form method="POST">
        @csrf
        @method('PUT')
        <h2 class="h3 ml-1 pt-2">Editar Administrador(a) | {{$adm->user->name}}</h2>
        <fieldset disabled>
            <div class="mb-3 form-group">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" placeholder={{$adm->id}} value={{$adm->id}}>
            </div>
        </fieldset>
        <div class="form-group mb-3">
            <label for="user_id">Selecione um usuário</label>
            <select class="form-control" id="user_id" name="user_id">
              @foreach ($users as $user)
                <option value={{$user->id}}>{{$user->email}}</option>
              @endforeach
            </select>
          </div>

          <div class="row justify-content-end pb-3">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg mr-4">   Editar   </button>
              </div>
          </div>
    </form>
</div>

@endsection


