@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Gestion des Stocks</h1>

    <div class="row text-center mt-4">
        <div class="col-md-4">
            <button id="btnOutOfStock" class="btn btn-danger mb-3">Produits en Rupture <span class="badge bg-light text-dark">{{ $outOfStock }}</span></button>
        </div>
        <div class="col-md-4">
            <button id="btnNearOutOfStock" class="btn btn-warning mb-3">Produits Proches de la Rupture <span class="badge bg-light text-dark">{{ $nearOutOfStock }}</span></button>
        </div>
        <div class="col-md-4">
            <button id="btnAllProducts" class="btn btn-success mb-3">Tous les Produits <span class="badge bg-light text-dark">{{ $totalProducts }}</span></button>
        </div>
    </div>
    <br>
    <br>
    <a href="{{ route('cbn.index') }}" class="btn btn-primary">Voir le CBN </a>

    <h2 class="mt-5">Liste des Produits <a href="{{ route('stocks.products.index') }}" class="btn btn-secondary"><i class="bi bi-gear-wide-connected"></i></a></h2>
    
    <!-- DataTable -->
    <table class="table" id="productsTable">
        <thead>
            <tr>
                <th>Nom</th>
                <th>SKU</th>
                <th>Prix</th>
                <th>Quantité en Stock</th>
                <th>Quantité minimum acceptable en Stock</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr data-stock="{{ $product->quantity_in_stock }}">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->price }} €</td>
                    <td>{{ $product->quantity_in_stock }}</td>
                    <td>{{ $product->minimum_stock_level }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun produit trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }} <!-- Pagination links -->
    </div>
    <a href="{{ route("dashboard") }}" class="btn btn-secondary mb-3">
        <i class="bi bi-box-arrow-left"></i> Retour
    </a>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#productsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/fr-FR.json',
            },
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10, // Nombre de lignes par page
            "createdRow": function(row, data, dataIndex) {
                var stockQuantity = parseInt(data[3], 10); // Assurez-vous que c'est un nombre entier
                var stockMin = parseInt(data[4], 10); 
                
                // Appliquer des classes en fonction du stock
                if (stockQuantity == 0) {
                    $(row).addClass('low-stock');  // Stock épuisé
                } else if (stockQuantity > 0 && stockQuantity <= stockMin) {
                    $(row).addClass('near-stock'); // Proche de la rupture
                } else {
                    $(row).addClass('normal-stock'); // Stock normal
                }
            },
            // Spécification du style Bootstrap 5 pour DataTable
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                   '<"row"<"col-sm-12"tr>>' +
                   '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        });

        // Gestion des filtres avec les boutons
        $('#btnOutOfStock').on('click', function() {
            table.columns(3).search('^0$', true, false).draw();
        });

        $('#btnNearOutOfStock').on('click', function() {
            table.columns(3).search('^[1-5]$', true, false).draw();
        });

        $('#btnAllProducts').on('click', function() {
            table.columns(3).search('').draw();
        });
    });
</script>
@endsection


@endsection
