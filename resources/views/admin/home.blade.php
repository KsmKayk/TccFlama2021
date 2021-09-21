@extends('adminlte::page')

@section('title', 'GeekAdmin')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-12 mt-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$ordersOnThisMonth->count()}}</h3>

                <p>Pedidos no mês</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 mt-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>Usuários Cadastrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-24">
            <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Vendas</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg"></span>
                      <span>R${{$moneyEarnedOnThisYear}} valor recebido no ano</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="sales-chart" height="400" style="display: block; height: 200px; width: 415px;" width="830" class="chartjs-render-monitor"></canvas>
                  </div>


                </div>
              </div>
        </div>

    </div>

@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>


    var ctx = document.getElementById('sales-chart').getContext('2d');


    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [{
                label: 'Vendas',
                data: [
                    {{$MoneyEarnedOnEachMonth[0]}},
                    {{$MoneyEarnedOnEachMonth[1]}},
                    {{$MoneyEarnedOnEachMonth[2]}},
                    {{$MoneyEarnedOnEachMonth[3]}},
                    {{$MoneyEarnedOnEachMonth[4]}},
                    {{$MoneyEarnedOnEachMonth[5]}},
                    {{$MoneyEarnedOnEachMonth[6]}},
                    {{$MoneyEarnedOnEachMonth[7]}},
                    {{$MoneyEarnedOnEachMonth[8]}},
                    {{$MoneyEarnedOnEachMonth[9]}},
                    {{$MoneyEarnedOnEachMonth[10]}},
                    {{$MoneyEarnedOnEachMonth[11]}}],
                backgroundColor: [
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                    'rgba(237,240,242,0.6)',
                    'rgba(70, 79, 102, 0.6)',
                ],
                borderColor: [
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                    'rgba(237,240,242,1)',
                    'rgba(70, 79, 102, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@stop
