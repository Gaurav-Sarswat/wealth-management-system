<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorSectorIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_sector_idea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_sector_id');
            $table->unsignedBigInteger('idea_id');
            $table->timestamps();

            $table->foreign('major_sector_id')->references('id')->on('major_sectors');
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
        Schema::dropIfExists('major_sector_idea');
    }
}
