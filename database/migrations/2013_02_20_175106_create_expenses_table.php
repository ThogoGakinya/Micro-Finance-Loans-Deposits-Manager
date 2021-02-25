<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('token_id');
            $table->integer('user_id');
            $table->integer('treasurer_id');
            $table->integer('treasurer_approval_status');
            $table->string('treasurer_approval_date');
            $table->integer('chair_id');
            $table->string('chair_approval_status');
            $table->string('chair_approval_date');
            $table->integer('amount');
            $table->longText('description');
            $table->string('request_date');
            $table->integer('process_status');
            $table->softDeletes();
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
        Schema::dropIfExists('expenses');
    }
}
