@extends('adminlte::page')

@section('title', 'GeekAdmin | Administradores')

@php

$config = [
    'columns' => [['orderable' => false], ['orderable' => false], ['orderable' => false],['orderable' => false], ['orderable' => false], ['orderable' => false], ['orderable' => false]],
    'language' => ['url' => '//cdn.datatables.net/plug-ins/1.11.2/i18n/pt_br.json'],
    "targets"=> 'no-sort',
    "bSort"=> false,

];
@endphp


@section('content')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)


<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h3>Produtos</h3>
                <a href="/admin/products/new" class="btn btn-outline-success">Adicionar</a>

            </div>

            <div class="table-responsive">
                <table id="table1"  style="width:100%" class="table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>PREÇO</th>
                            <th>IMAGEM</th>
                            <th>CATEGORIA</th>
                            <th>DESCRIÇÃO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td >R${{$product->price}}</td>
                            <td ><img src={{$product->image_url}} alt={{$product->name}} id="img_product" ></td>
                            <td>{{$product->category->name}}</td>
                            <td >{{$product->description}}</td>
                            <td class="d-flex justify-content-center mt-5">
                                <a href="/admin/products/{{$product->id}}/edit" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                <form method="POST"action="/admin/products/{{$product->id}}/delete" onsubmit="return confirm ('Tem certeza que deseja remover o produto: {{ addslashes($product->name) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger ml-2 mr-2"><i class="far fa-trash-alt"></i></button>
                                </form>
                                {{-- <a href="/admin/administrators/{{$adm->id}}" class="btn btn-outline-warning"><i class="fas fa-eye"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>


        var table = $('#table1').DataTable( @json($config) );
        table.order().listener('#table1 th:eq(0)', 0);


</script>
@endsection

@section('css')
<style type="text/css">
    #table1 tr td,  #table1 tr th {
        vertical-align: middle;
        text-align: center;
    }

    #img_product {
        max-width: 150px;
    }
</style>
@endsection

