<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interestings', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('asset_id', 21);
            $table->string('exchange_id', 21);
            $table->string('currency_id', 21);
            $table->enum('trend', ['-', 'LONG', 'SHORT', 'STRONG_LONG', 'STRONG_SHORT', 'NEUTRAL'])->nullable()->default('-');
            $table->decimal('last_price', 128, 18)->nullable()->default(0);
            $table->decimal('last_percent', 128, 2)->nullable()->default(0);
            $table->boolean('open_order')->nullable()->default(false);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('asset_id')->references('id')->on('assets')->cascadeOnDelete();
            $table->foreign('exchange_id')->references('id')->on('exchanges')->cascadeOnDelete();
            $table->foreign('currency_id')->references('id')->on('currencies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interestings');
    }
};
