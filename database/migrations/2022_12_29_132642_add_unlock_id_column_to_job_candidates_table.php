<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('job_candidates', function (Blueprint $table) {
            $table->bigInteger('unlock_id')->unsigned()->after('id');
            $table->foreign('unlock_id')->references('id')->on('candidate_unlocks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('job_candidates', function (Blueprint $table) {
            $table->dropForeign(['unlock_id']);
            $table->dropColumn(['unlock_id']);
        });
    }
};
