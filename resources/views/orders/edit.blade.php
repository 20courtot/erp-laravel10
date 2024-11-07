@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier la Commande</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Produit</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Sélectionnez un produit</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ $order->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="expected_delivery_date" class="form-label">Date de livraison prévue</label>
            <input type="date" name="expected_delivery_date" id="expected_delivery_date" class="form-control" value="{{ $order->expected_delivery_date ? $order->expected_delivery_date->format('Y-m-d') : '' }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $order->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut de la Commande</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour la Commande</button>
    </form>
</div>
@endsection
