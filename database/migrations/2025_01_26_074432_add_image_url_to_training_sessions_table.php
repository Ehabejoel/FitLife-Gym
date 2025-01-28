<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlToTrainingSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('capacity');
        });
    }

    public function down()
    {
        Schema::table('training_sessions', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}
