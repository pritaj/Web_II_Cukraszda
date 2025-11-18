@extends('layouts.app')

@section('title', 'Diagram')

@section('content')

<h1>📊 Statisztikák</h1>
<p class="major">Süteménykínálatunk adatai</p>

<div class="items style2 big">
    <!-- Sütemények típus szerint -->
    <div>
        <div class="inner">
            <h2>Sütemények típus szerint</h2>
            <div style="position: relative; height: 400px;">
                <canvas id="tipusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Díjazott sütemények -->
    <div>
        <div class="inner">
            <h2>Díjazott sütemények</h2>
            <div style="position: relative; height: 400px;">
                <canvas id="dijazottChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Típusok diagram - oszlopdiagram
    const tipusCtx = document.getElementById('tipusChart').getContext('2d');
    const tipusChart = new Chart(tipusCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($tipusok->pluck('tipus')) !!},
            datasets: [{
                label: 'Darabszám',
                data: {!! json_encode($tipusok->pluck('count')) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(199, 199, 199, 0.7)',
                    'rgba(83, 102, 255, 0.7)',
                    'rgba(255, 99, 255, 0.7)',
                    'rgba(99, 255, 132, 0.7)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(199, 199, 199, 1)',
                    'rgba(83, 102, 255, 1)',
                    'rgba(255, 99, 255, 1)',
                    'rgba(99, 255, 132, 1)',
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Díjazott diagram - kördiagram
    const dijazottCtx = document.getElementById('dijazottChart').getContext('2d');
    const dijazottChart = new Chart(dijazottCtx, {
        type: 'pie',
        data: {
            labels: ['Díjazott', 'Nem díjazott'],
            datasets: [{
                label: 'Darabszám',
                data: [{{ $dijazott }}, {{ $nemDijazott }}],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(201, 203, 207, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

@endsection