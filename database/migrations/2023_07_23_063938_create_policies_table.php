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
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('policy_title');
            $table->text('policy_body');
            $table->boolean('policy_enabled')->default(true);
            $table->unsignedInteger('policy_type_id')->nullable();
            $table->timestamps();
        });
        Schema::table('policies', function (Blueprint $table) {
            $table->foreign('policy_type_id')->references('id')->on('policy_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
