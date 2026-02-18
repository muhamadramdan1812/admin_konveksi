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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_draft_id')
              ->constrained('order_drafts')
              ->onDelete('cascade');

        $table->string('product_name');
        $table->string('size')->nullable();
        $table->string('series')->nullable();
        $table->integer('qty')->default(1);
        $table->text('note')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
