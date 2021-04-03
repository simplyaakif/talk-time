<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTalentPackageTable extends Migration {

        public function up()
        {
            Schema::create('talent_package', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('order_number')->nullable();
                $table->integer('talent_id')->nullable();
                $table->integer('package_id')->nullable();
                $table->integer('due_date_price')->nullable();
                $table->text('package_active')->nullable();
                $table->text('paid_amount')->nullable();
                $table->text('session_mode')->nullable();
                $table->text('click_to_pay')->nullable();
                $table->text('connect_pay_id')->nullable();
                $table->text('is_fee_applied')->nullable();
                $table->text('connect_pay_fee')->nullable();
                $table->date('due_date')->nullable();
                $table->text('paid_status')->nullable();
                $table->date('paid_on')->nullable();

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('');
        }
    }
