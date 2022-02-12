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
        Schema::create('api_exchanges', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->uuid('user_id');
            $table->string('exchange_id', 21);
            $table->string('api_key');
            $table->string('api_secret');
            $table->date('expire_date')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('exchange_id')->references('id')->on('exchanges')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_exchanges');
    }
};
