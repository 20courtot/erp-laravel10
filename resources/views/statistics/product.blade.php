@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistiques pour le produit {{ $productId }}</h1>

    <!-- Statistiques des ventes mensuelles -->
    <div class="card mt-4">
        <div class="card-header">Ventes par mois</div>
        <div class="card-body">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <!-- Prévision des ventes -->
    <div class="card mt-4">
        <div class="card-header">Prévision des ventes pour les 4 mois à venir</div>
        <div class="card-body">
            <canvas id="predictionChart"></canvas>
        </div>
    </div>

    <!-- Niveau de stock -->
    <div class="card mt-4">
        <div class="card-header">Niveau de stock des produits</div>
        <div class="card-body">
            <ul>
                @foreach($stockLevels as $name => $quantity)
                    <li>{{ $name }} : {{ $quantity }} en stock</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Produits les plus vendus -->
    <div class="card mt-4">
        <div class="card-header">Top 5 des produits vendus</div>
        <div class="card-body">
            <ul>
                @foreach($topProducts as $product)
                    <li>{{ $product['name'] }} : {{ $product['total_sales'] }} ventes</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Ventes de la semaine actuelle -->
    <div class="card mt-4">
        <div class="card-header">Ventes de la semaine actuelle</div>
        <div class="card-body">
            <p>{{ $currentWeekSales }} ventes cette semaine</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique des ventes mensuelles
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach($salesPerMonth as $sale)
                    '{{ $sale['month'] }}',
                @endforeach
            ],
            datasets: [{
                label: 'Ventes',
                data: [
                    @foreach($salesPerMonth as $sale)
                        {{ $sale['count'] }},
                    @endforeach
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique des prévisions de ventes
    var ctxPrediction = document.getElementById('predictionChart').getContext('2d');
    var predictionChart = new Chart(ctxPrediction, {
        type: 'bar',
        data: {
            labels: ['Mois 1', 'Mois 2', 'Mois 3', 'Mois 4'],
            datasets: [{
                label: 'Prévision des ventes',
                data: [
                    @foreach($predictedSales as $predictedSale)
                        {{ $predictedSale }},
                    @endforeach
                ],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
