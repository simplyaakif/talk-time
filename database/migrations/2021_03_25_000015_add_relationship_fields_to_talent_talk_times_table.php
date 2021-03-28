<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTalentTalkTimesTable extends Migration
{
    public function up()
    {
        Schema::table('talent_talk_times', function (Blueprint $table) {
            $table->unsignedBigInteger('talent_id')->nullable();
            $table->foreign('talent_id', 'talent_fk_3520696')->references('id')->on('talent');
        });
    }
}
