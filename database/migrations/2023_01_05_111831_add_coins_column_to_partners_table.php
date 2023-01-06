<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->bigInteger('coins')->unsigned()->default(0)->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['coins']);
        });
    }
};
