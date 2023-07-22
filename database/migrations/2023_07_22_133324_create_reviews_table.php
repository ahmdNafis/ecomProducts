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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review_title')->nullable();
            $table->text('review_body')->nullable();
            $table->enum('review_star', [1, 2, 3, 4, 5])->default(5);

            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
