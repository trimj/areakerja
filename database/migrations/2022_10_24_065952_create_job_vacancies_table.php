<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');

            $table->string('title', 100)->default('Hello World!');
            $table->string('slug', 255)->default('hello-world');
            $table->text('description')->nullable();

            $table->bigInteger('mainSkill')->unsigned();
            $table->foreign('mainSkill')->references('id')->on('skill_lists')->onDelete('cascade');

            $table->json('otherSkill')->nullable();

            $table->json('address')->nullable();

            $table->bigInteger('minSalary')->nullable();
            $table->bigInteger('maxSalary')->nullable();

            $table->dateTime('deadline')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_vacancies');
    }
};
