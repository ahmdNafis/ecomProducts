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
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('shipping_address');
            $table->text('billing_address')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::table('shippings', function(Blueprint $t) {
            $t->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
