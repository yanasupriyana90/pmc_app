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
        Schema::create('selling_buyings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_sheet_head_id');
            $table->decimal('exchange_rate', 11,2);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('job_sheet_head_id')->references('id')->on('job_sheet_heads')->onDelete('restrict');
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
        Schema::table('selling_buyings', function (Blueprint $table) {
            $table->dropForeign(['job_sheet_head_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('selling_buyings');

    }
};
