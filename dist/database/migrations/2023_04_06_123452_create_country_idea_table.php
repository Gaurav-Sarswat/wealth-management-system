<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_idea', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('countries_id');
            $table->unsignedBigInteger('idea_id');
            $table->timestamps();

            $table->foreign('countries_id')->references('id')->on('countries');
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
        Schema::dropIfExists('country_idea');
    }
}
