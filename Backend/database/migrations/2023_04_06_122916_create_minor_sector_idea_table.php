<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorSectorIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minor_sector_idea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('minor_sector_id');
            $table->unsignedBigInteger('idea_id');
            $table->timestamps();

            $table->foreign('minor_sector_id')->references('id')->on('minor_sectors');
            $table->foreign('idea_id')->references('id')->on('ideas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minor_sector_idea');
    }
}
