<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->timestamp('heure_commencee')->nullable()->after('heure_fin');
            $table->timestamp('heure_terminee')->nullable()->after('heure_commencee');
        });
    }

    public function down()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->dropColumn('heure_commencee');
            $table->dropColumn('heure_terminee');
        });
    }
};
