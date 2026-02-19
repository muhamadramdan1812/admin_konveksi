<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_drafts', function (Blueprint $table) {
            $table->foreignId('reseller_id')
                  ->nullable()
                  ->constrained('resellers')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('order_drafts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reseller_id');
        });
    }
};