@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@section('content')



<div class="col-12 mt-3 bg-dark">
    <form method="POST">
        @csrf
        @method('PUT')
        <h2 class="h3 ml-1 pt-2">Editar Pedido | {{$order->id}} : {{$order->user->email}}</h2>
        <fieldset disabled>
            <div class="mb-3 form-group">
              <label for="id" class="form-label">ID</label>
              <input type="text" name="id" id="id" class="form-control" placeholder={{$order->id}} value={{$order->id}}>
            </div>
        </fieldset>
        <div class="form-group mb-3">
            <label for="status_id">Selecione um estado</label>
            <select class="form-control" id="status_id" name="status_id">
              @foreach ($statuses as $status)
                <option value={{$status->id}}>{{$status->name}}</option>
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


