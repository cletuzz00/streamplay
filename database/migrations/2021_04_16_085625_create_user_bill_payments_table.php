<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBillPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bill_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('bill_type');
            $table->integer('subscription_type');
            $table->double('credit')->default(0);
            $table->double('debit')->default(0);
            $table->date('valid_until');
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
        Schema::dropIfExists('user_bill_payments');
    }
}
