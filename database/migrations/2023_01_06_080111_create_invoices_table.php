<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');

            $table->string('invoice');
            $table->integer('amount')->default(0);
            $table->enum('payment_status', ['pending', 'success', 'failed', 'expired', 'canceled'])->default('pending');
            $table->string('payment_method', 55)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
