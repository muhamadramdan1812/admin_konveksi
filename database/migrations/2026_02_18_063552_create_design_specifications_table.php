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
        Schema::create('design_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('print_order_id')->constrained()->cascadeOnDelete();
            $table->string('design_name');
            $table->string('file_corel')->nullable(); // path file
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('design_specifications');
    }
};
