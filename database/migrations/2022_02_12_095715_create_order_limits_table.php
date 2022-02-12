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
        Schema::create('order_limits', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->uuid('user_id');
            $table->string('order_type_id', 21)->nullable();
            $table->boolean('is_unlimited')->nullable()->default(false);
            $table->integer('total_limit')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('order_type_id')->references('id')->on('order_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_limits');
    }
};
