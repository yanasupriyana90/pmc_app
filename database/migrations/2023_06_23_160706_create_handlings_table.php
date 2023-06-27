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
        Schema::create('handlings', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('volume');
            $table->decimal('price', 11, 2);
            $table->decimal('actual_amt', 11, 2);
            $table->float('tax_rate', 5, 2);
            $table->decimal('tax_amt', 11, 2);
            $table->decimal('final_amount', 11, 2);
            $table->unsignedBigInteger('selling_buying_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('selling_buying_id')->references('id')->on('selling_buyings')->onDelete('restrict');
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
        Schema::table('handlings', function (Blueprint $table) {
            $table->dropForeign(['selling_buying_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('handlings');
    }
};
