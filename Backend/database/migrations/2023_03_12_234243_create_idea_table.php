<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("abstract");
            $table->string("content");
            $table->integer("risk_rating");
            $table->date("expiry_date");
            $table->string("category");
            $table->string("instruments");
            $table->string("currency");
            $table->string("major_sector");
            $table->string("minor_sector");
            $table->string("region");
            $table->string("country");
            $table->string("image")->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('published_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idea');
    }
}
