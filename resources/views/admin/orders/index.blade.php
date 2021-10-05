@extends('adminlte::page')

@section('title', 'GeekAdmin | Categorias')

@php

$config = [
    'columns' => [['orderable' => false], ['orderable' => false], ['orderable' => false],['orderable' => false],['orderable' => false]],
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
                <h3>Pedidos</h3>
            </div>

            <div class="table-responsive">
                <table id="table1"  style="width:100%" class="table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USUÁRIO</th>
                            <th>ESTADO</th>
                            <th>PRODUTOS</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->email}}</td>
                            <td></td>
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
</style>
@endsection

