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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id')->nullable();
            $table->unsignedBigInteger('icecek_id')->nullable();
            $table->unsignedBigInteger('atistirmalik_id')->nullable();
            $table->unsignedBigInteger('sos_id')->nullable();
            $table->unsignedBigInteger('tatli_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['pizza_id', 'icecek_id', 'atistirmalik_id', 'sos_id', 'tatli_id', 'name', 'quantity']);
        });
    }
};
