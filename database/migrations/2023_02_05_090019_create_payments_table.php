<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('login')->comment('Логин');
            $table->text('requisites')->comment('Реквизиты');
            $table->bigInteger('amount')->comment('Сумма');
            $table->string('currency')->index()->comment('Валюта');
            $table->enum('status', ['Оплачен', 'Не оплачен'])->default('Не оплачен')->comment('Статус');
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
        Schema::dropIfExists('payments');
    }
}
