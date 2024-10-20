@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Gestion des Produits</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route("stocks.index") }}" class="btn btn-secondary mb-3">
        <i class="bi bi-box-arrow-left"></i> Retour
    </a>
    <a href="{{ route('stocks.products.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Ajouter un produit
    </a>

    <table id="productsTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>SKU</th>
                <th>Prix</th>
                <th>Quantité en Stock</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->price }} €</td>
                    <td>{{ $product->quantity_in_stock }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('stocks.products.edit', $product) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('stocks.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#productsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/fr-FR.json',
            },
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10, // Nombre de lignes par page
        });
    });
</script>
@endsection

@endsection
