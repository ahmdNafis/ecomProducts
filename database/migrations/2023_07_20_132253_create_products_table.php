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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_title');
            $table->char('product_code', 40)->unique();
            $table->string('product_slug')->nullable();
            $table->decimal('product_price', 8, 2);
            $table->boolean('product_available')->default(true);
            $table->integer('product_featured')->default(0);
            $table->boolean('has_sizes')->default(true)->nullable();
            $table->string('product_images')->nullable();

            $table->unsignedInteger('product_type_id');

            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
                $table->foreign('product_type_id')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
