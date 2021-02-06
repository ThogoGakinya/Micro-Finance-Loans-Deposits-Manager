<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_payments', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->string('TransID')->unique();
            $table->string('TransTime');
            $table->integer('TransAmount');
            $table->integer('BusinessShortCodet');
            $table->string('BillRefNumber');
            $table->string('InvoiceNumber');
            $table->integer('OrgAccountBalance');
            $table->string('ThirdPartyTransID');
            //$table->integer('OrgAccountBalance');
            $table->integer('MSISDN');
            $table->longText('FirstName');
            $table->longText('MiddleName');
            $table->longText('LastName');
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
        Schema::dropIfExists('mobile_payments');
    }
}
