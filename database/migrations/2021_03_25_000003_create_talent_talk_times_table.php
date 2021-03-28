<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentTalkTimesTable extends Migration
{
    public function up()
    {
        Schema::create('talent_talk_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('minutes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
