<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_in_banks', function (Blueprint $table) {
            $table->id();
            $table->string('no_trans');
            $table->date('date_trans');
            $table->string('desc');
            $table->double('debit')->nullable();
            $table->double('credit')->nullable();
            $table->unsignedBigInteger('bank_account_id');
            $table->string('trans_doc')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cash_in_banks', function (Blueprint $table) {
            $table->dropForeign(['bank_account_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('cash_in_banks');
    }
};
