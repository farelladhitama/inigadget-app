<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto increment ID
            $table->foreignId('customer_id')
                  ->constrained()
                  ->cascadeOnDelete(); // Hapus order jika customer dihapus

            $table->dateTime('order_date')->default(now()); // Tanggal order
            $table->decimal('total_amount', 10, 2)->default(0.00); // Total harga

            // Status order
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])
                  ->default('pending');

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
