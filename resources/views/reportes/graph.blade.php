@extends('adminlte::page')
@section('content')
<div class="col-md-10">

    <canvas id="myChart" width="300" height="200"></canvas>
</div>





<script>
var valores=[];
var info=[];
$(document).ready(function(){
    $.ajax({
        url:'/graph',
        method:'POST',
        data:{
            _token:$('input[name="_token"]').val()
        }
    }).done(function(res){

        var arreglo= JSON.parse(res);

        for(var x=0; x<arreglo.length;x++){
            info.push(arreglo.[x].categoria);
            valores.push(arreglo[x].monto);
        }
        generarGrafica();
    });
}

function generarGrafica(){
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: info,
            datasets: [{
                label: 'Gastos e Ingresos',
                data: valores,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 0.2)',
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
}


</script>


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="/js/chartjs.line_chart.js"></script>
@endpush

@endsection
