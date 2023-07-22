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
        Schema::create('products_sizes', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('size_id');

            $table->decimal('dimension_value', 4, 2)->default(0);
            $table->string('decimal_title')->default('length');
        });
        Schema::table('products_sizes', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_sizes');
    }
};
