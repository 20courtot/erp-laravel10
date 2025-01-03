<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity'); // Quantité commandée
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending'); // Statut de la commande
            $table->date('expected_delivery_date')->nullable(); // Date prévue de livraison
            $table->text('description')->nullable(); // Remarques ou description de la commande
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
