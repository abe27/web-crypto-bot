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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->uuid('user_id');
            $table->string('interest_id', 21)->nullable();
            $table->string('order_type_id', 21)->nullable();
            $table->string('orderno')->unique();
            $table->decimal('at_price', 65, 2)->nullable()->default(0.00000000);
            $table->decimal('total_coin', 65, 2)->nullable()->default(0.00000000);
            $table->enum('type', ['Auto', 'Manual'])->nullable()->default('Auto');
            $table->enum('status', ['-', 'Close', 'Hold', 'Open', 'Cancel'])->nullable()->default('-');
            $table->boolean('is_checked')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('interest_id')->references('id')->on('interestings')->cascadeOnDelete();
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
        Schema::dropIfExists('orders');
    }
};
