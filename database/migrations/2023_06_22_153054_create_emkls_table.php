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
        Schema::create('emkls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selling_buying_id');
            $table->string('item_name');
            $table->integer('volume');
            $table->decimal('price', 13, 4);
            $table->decimal('actual_amt', 13,4);
            $table->tinyInteger('tax_rate');
            $table->decimal('tax_amt', 13, 4);
            $table->decimal('final_amount', 13, 4);
            $table->timestamps();
            $table->foreign('selling_buying_id')->references('id')->on('selling_buyings')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emkls', function (Blueprint $table) {
            $table->dropForeign(['selling_buying_id']);
        });
        Schema::dropIfExists('emkls');
    }
};
