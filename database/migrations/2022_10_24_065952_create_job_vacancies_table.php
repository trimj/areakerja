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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('partner_id')->unsigned()->unique();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');

            $table->string('title', 100)->default('Hello World!');
            $table->string('slug', 255)->default('hello-world');
            $table->text('description')->nullable();


            $table->bigInteger('mainSkill')->unsigned()->nullable();
            $table->foreign('mainSkill')->references('id')->on('skill_lists')->onDelete('cascade');

            $table->json('otherSkill')->nullable();

//            $table->text('location');
            $table->bigInteger('province')->nullable();
            $table->bigInteger('city')->nullable();
            $table->bigInteger('district')->nullable();
            $table->bigInteger('village')->nullable();

            $table->bigInteger('minSalary');
            $table->bigInteger('maxSalary');

            $table->dateTime('deadline')->nullable();

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
        Schema::dropIfExists('job_vacancies');
    }
};
