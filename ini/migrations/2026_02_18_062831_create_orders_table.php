<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_draft_id')
              ->nullable()
              ->constrained('order_drafts')
              ->nullOnDelete();

        $table->string('reseller')->nullable();
        $table->string('customer_name');
        $table->date('order_date')->nullable();
        $table->date('deadline')->nullable();
        $table->string('status')->default('order'); // order, print, design, shipping, done
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
};
