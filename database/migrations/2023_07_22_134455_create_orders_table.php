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
            $table->increments('id');
            $table->date('order_created');
            $table->char('order_code', 20)->unique();
            $table->decimal('grand_total', 8, 2);
            $table->integer('total_quantity')->default(1);
            $table->text('note')->nullable();
            $table->enum('payment_method', ['cash_on_delivery', 'card_transfer', 'mobile_transfer', 'online_payment'])->default('cash_on_delivery');


            $table->unsignedInteger('shipping_rate_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('shipping_rate_id')->references('id')->on('shipping_rates');
            $table->foreign('user_id')->references('id')->on('users');
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
