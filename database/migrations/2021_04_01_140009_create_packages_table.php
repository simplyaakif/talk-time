<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePackagesTable extends Migration {

        public function up()
        {
            Schema::create('packages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('title');
                $table->text('time')->nullable();
                $table->integer('price');
                $table->text('excerpt')->nullable();
                $table->text('description')->nullable();
                $table->json('info')->nullable();
                //

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('packages');
        }
    }
