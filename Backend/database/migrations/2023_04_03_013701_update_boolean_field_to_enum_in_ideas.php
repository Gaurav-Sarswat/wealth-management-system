<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBooleanFieldToEnumInIdeas extends Migration
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
            $table->dropColumn('rm_status');
            $table->enum('verification_status', ['accepted', 'rejected', 'pending'])->default('pending');
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
            $table->dropColumn('verification_status');
            $table->boolean('rm_status')->default(false);
        });
    }
}
