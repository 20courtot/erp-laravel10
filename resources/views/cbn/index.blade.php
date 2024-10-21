@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Résultats du Calcul des Besoins Nets (CBN)</h1>

    @if(count($cbnResults) > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Besoin Brut</th>
                    <th>Stock Disponible</th>
                    <th>Commandes en Cours</th>
                    <th>Besoin Net</th>
                    <th>Seuil Minimum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cbnResults as $result)
                <tr>
                    <td>{{ $result['product_name'] }}</td>
                    <td>{{ $result['besoin_brut'] }}</td>
                    <td>{{ $result['stock_disponible'] }}</td>
                    <td>{{ $result['commandes_en_cours'] }}</td>
                    <td>{{ $result['besoin_net'] }}</td>
                    <td>{{ $result['seuil_minimum'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun besoin de réapprovisionnement pour le moment.</p>
    @endif
    <a href="{{ route("stocks.index") }}" class="btn btn-secondary mb-3">
        <i class="bi bi-box-arrow-left"></i> Retour
    </a>
</div>
@endsection
