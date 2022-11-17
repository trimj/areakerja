<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('description')->nullable();
            $table->bigInteger('phone')->unsigned()->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('website', 255)->nullable();
            $table->json('address')->nullable();

            $table->boolean('tos')->nullable()->default(false);

            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('rejected_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
};
