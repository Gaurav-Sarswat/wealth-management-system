<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdeaRemoveMajorMinorSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            //
            $table->dropColumn('major_sector');
            $table->dropColumn('minor_sector');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            //
            $table->string('major_sector')->nullable();
            $table->string('minor_sector')->nullable();
        });
    }
}
