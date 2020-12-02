@extends('adminlte::page')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="col-md-10">

    <canvas id="myChart" width="300" height="200"></canvas>
</div>



 




<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
var valores=[1,3];
var info=['qew','rt'];
$(document).ready(function(){
    $.ajax({
        url:'/graph',
        method:'POST',
        data:{
            _token:$('input[name="_token"]').val()
        }
    }).done(function(res){
        alert(res);
        var arreglo;

        for(var x=0; x<arreglo.length;x++){;
            info.push(arreglo.[x].categoria);
        }
        
    });
}


    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:info ,
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



</script>



@endsection
