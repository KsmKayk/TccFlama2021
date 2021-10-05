@extends('adminlte::page')

@section('title', 'GeekAdmin | Categorias')

@php

$config = [
    'columns' => [['orderable' => false], ['orderable' => false], ['orderable' => false]],
    'language' => ['url' => '//cdn.datatables.net/plug-ins/1.11.2/i18n/pt_br.json'],
    "targets"=> 'no-sort',
    "bSort"=> false,

];
@endphp

@section('content')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)


<div class="col-12 mt-3 bg-dark">
    <div class="card">
        <h3 class="mt-2 ml-2">Pedido {{$order->id}} : {{$order->user->email}}</h3>
        <div class="d-flex justify-content-between">
            <div class="col-6 mt-3">
                <x-adminlte-info-box title="Estado do pedido" theme="primary" text="{{$order->OrderStatus->name}}" icon="fas fa-spinner"/>
            </div>
            <div class="col-6 mt-3">
                <x-adminlte-info-box title="Quantidade de itens" theme="purple" text="{{$order->OrderItems->count()}}" icon="fas fa-cart-plus"/>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-11 mt-2 mb-3 border border-light">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1"  style="width:100%" class="table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->OrderItems as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->description}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
</style>
@endsection





