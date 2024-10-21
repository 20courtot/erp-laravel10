@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Éditer le Produit</h1>

    <form action="{{ route('stocks.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ $product->sku }}" required>
            @error('sku')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity_in_stock" class="form-label">Quantité en Stock</label>
            <input type="number" class="form-control @error('quantity_in_stock') is-invalid @enderror" id="quantity_in_stock" name="quantity_in_stock" value="{{ $product->quantity_in_stock }}" required min="0">
            @error('quantity_in_stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <a href="{{ route("stocks.products.index") }}" class="btn btn-secondary">
                <i class="bi bi-box-arrow-left"></i> Retour
            </a>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection
