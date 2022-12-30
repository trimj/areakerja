<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('id')->on('job_vacancies')->onDelete('cascade');

            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');

            $table->bigInteger('mitra_id')->unsigned();
            $table->foreign('mitra_id')->references('id')->on('partners')->onDelete('cascade');

            $table->dateTime('s_mitra')->nullable();        // Submitted by Mitra
            $table->dateTime('a_mitra')->nullable();        // Accepted by Mitra
            $table->dateTime('r_mitra')->nullable();        // Rejected by Mitra

            $table->dateTime('s_candidate')->nullable();    // Submitted by Candidate
            $table->dateTime('a_candidate')->nullable();    // Accepted by Candidate
            $table->dateTime('r_candidate')->nullable();    // Rejected by Candidate

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_candidates');
    }
};
