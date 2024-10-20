@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Bienvenue sur votre tableau de bord</h1>
    
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    Gestion des Ventes
                </div>
                <div class="card-body">
                    <i class="bi bi-cart4 fs-1"></i> <!-- Icône pour la gestion des ventes -->
                    <h5 class="card-title mt-3">Suivez vos transactions avec facilité.</h5>
                    <a href="{{ route('sales.index') }}" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-header bg-success text-white">
                    Gestion des Stocks
                </div>
                <div class="card-body">
                    <i class="bi bi-box fs-1"></i> <!-- Icône pour la gestion des stocks -->
                    <h5 class="card-title mt-3">Suivez vos produits disponibles.</h5>
                    <a href="{{ route('stocks.index') }}" class="btn btn-success">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-header bg-info text-white">
                    Statistiques
                </div>
                <div class="card-body">
                    <i class="bi bi-bar-chart fs-1"></i> <!-- Icône pour les statistiques -->
                    <h5 class="card-title mt-3">Prenez des décisions éclairées</h5>
                    <a href="{{ route('statistics.index') }}" class="btn btn-info">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
