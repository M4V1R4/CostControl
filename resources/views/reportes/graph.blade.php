@extends('adminlte::page')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <canvas id="myChart" width="300" height="200"></canvas>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var valores[];
var info[];
var myChart = new Chart(ctx, {
    type: 'bar ',
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
</script>


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="/js/chartjs.line_chart.js"></script>
@endpush

@endsection
