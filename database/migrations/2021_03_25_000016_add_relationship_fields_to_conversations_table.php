<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToConversationsTable extends Migration
{
    public function up()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->unsignedBigInteger('talent_id')->nullable();
            $table->foreign('talent_id', 'talent_fk_3520686')->references('id')->on('talent');
            $table->unsignedBigInteger('guide_id')->nullable();
            $table->foreign('guide_id', 'guide_fk_3520687')->references('id')->on('guides');
        });
    }
}
