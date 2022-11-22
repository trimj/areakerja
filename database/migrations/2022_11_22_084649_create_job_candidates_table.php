<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('job_vacancies')->onDelete('cascade');

            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');

            $table->dateTime('unlocked')->nullable();

            $table->dateTime('sByMitra')->nullable();        // Submitted by Mitra
            $table->dateTime('aByMitra')->nullable();        // Accepted by Mitra
            $table->dateTime('rByMitra')->nullable();        // Rejected by Mitra
            $table->dateTime('sByCandidate')->nullable();    // Submitted by Candidate
            $table->dateTime('aByCandidate')->nullable();    // Accepted by Candidate
            $table->dateTime('rByCandidate')->nullable();    // Rejected by Candidate

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_candidates');
    }
};
