<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('candidate_unlocks', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');

            $table->bigInteger('mitra_id')->unsigned();
            $table->foreign('mitra_id')->references('id')->on('partners')->onDelete('cascade');

            $table->dateTime('unlocked_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidate_unlocks');
    }
};
