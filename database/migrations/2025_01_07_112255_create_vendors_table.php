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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('initial_code', 4)->unique();
            $table->string('name');
            $table->string('address');
            $table->string('phone_1', 20);
            $table->string('phone_2', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email');
            $table->unsignedBigInteger('mandatory_tax_id');
            $table->string('tax_id', 35)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
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
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('vendors');
    }
};
