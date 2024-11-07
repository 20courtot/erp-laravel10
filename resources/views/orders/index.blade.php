@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Liste des Commandes</h1>
    
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Simuler une commande
    </a>

    <table id="ordersTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Statut</th>
                <th>Date de Création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product->name ?? 'Produit non trouvé' }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>{{ $order->expected_delivery_date->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i> Voir
                    </a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Éditer
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json',
            },
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10
        });
    });
</script>
@endpush
