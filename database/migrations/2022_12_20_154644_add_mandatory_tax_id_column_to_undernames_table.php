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
        Schema::table('undernames', function (Blueprint $table) {
            $table->foreign('mandatory_tax_id')->references('id')->on('mandatory_taxes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('undernames', function (Blueprint $table) {
            $table->dropForeign(['mandatory_tax_id']);
        });
    }
};
