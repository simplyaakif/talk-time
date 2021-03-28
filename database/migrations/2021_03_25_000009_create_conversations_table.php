<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->longText('guide_remarks')->nullable();
            $table->longText('talent_remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
