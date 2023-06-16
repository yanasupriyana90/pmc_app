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
        Schema::create('revenue_of_sales', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('volume');
            $table->decimal('unit_cost', 11, 2);
            $table->decimal('amount', 11, 2);
            $table->string('remarks')->nullable();
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
        Schema::table('revenue_of_sales', function (Blueprint $table) {
            $table->dropForeign(['selling_buying_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('revenue_of_sales');
    }
};
