@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Simuler une Nouvelle Commande</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Produit</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Sélectionnez un produit</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="expected_delivery_date" class="form-label">Date de livraison prévue</label>
            <input type="date" name="expected_delivery_date" id="expected_delivery_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Commentaires supplémentaires"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer la Commande</button>
    </form>
</div>
@endsection
