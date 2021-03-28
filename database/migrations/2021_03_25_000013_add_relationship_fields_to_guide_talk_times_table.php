<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGuideTalkTimesTable extends Migration
{
    public function up()
    {
        Schema::table('guide_talk_times', function (Blueprint $table) {
            $table->unsignedBigInteger('guide_id')->nullable();
            $table->foreign('guide_id', 'guide_fk_3520702')->references('id')->on('guides');
        });
    }
}
