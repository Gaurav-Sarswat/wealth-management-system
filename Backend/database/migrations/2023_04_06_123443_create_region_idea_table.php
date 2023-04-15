<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_idea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('idea_id');
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
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
        Schema::dropIfExists('region_idea');
    }
}
