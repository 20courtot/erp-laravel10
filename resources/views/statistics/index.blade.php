@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sélectionner un produit</h1>

    <!-- Formulaire pour sélectionner un produit -->
    <form action="{{ route('statistics.product') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product">Produit :</label>
            <select name="product_id" id="product" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Afficher les statistiques</button>
    </form>
</div>
@endsection
