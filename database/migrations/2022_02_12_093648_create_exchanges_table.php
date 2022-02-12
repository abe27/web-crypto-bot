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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('group_id', 21)->nullable();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->string('currency', 5)->nullable();
            $table->enum('exchange_type', ['spot', 'feature', 'all'])->nullable()->default('spot');
            $table->string('image_url')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('exchange_groups')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
};
