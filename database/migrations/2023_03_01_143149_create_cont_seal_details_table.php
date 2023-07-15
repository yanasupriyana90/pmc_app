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
        Schema::create('cont_seal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_sheet_head_id')->nullable();
            $table->string('cont_name', 30)->nullable();
            $table->string('seal_name', 30)->nullable();
            // $table->integer('qty')->nullable();
            // $table->unsignedBigInteger('type_pack_id')->nullable();
            // $table->float('net_weight', 8, 2)->nullable();
            // $table->string('net_type_weight', 15)->nullable();
            // $table->float('gross_weight', 8, 2)->nullable();
            // $table->string('gross_type_weight', 15)->nullable();
            // $table->float('measurement', 8 ,2)->nullable();
            // $table->string('type_measurement', 5)->nullable();
            // $table->unsignedBigInteger('job_sheet_head_id')->nullable();
            $table->timestamps();
            $table->foreign('job_sheet_head_id')->references('id')->on('job_sheet_heads')->onDelete('restrict');
            // $table->foreign('type_pack_id')->references('id')->on('type_packagings')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cont_seal_details', function (Blueprint $table) {
            $table->dropForeign(['job_sheet_head_id']);
            // $table->dropForeign(['type_pack_id']);
        });

        Schema::dropIfExists('cont_seal_details');
    }
};
