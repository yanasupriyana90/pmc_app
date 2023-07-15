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
            $table->decimal('exchange_rate_ros', 9, 4);
            $table->decimal('exchange_rate_cos', 9, 4);
            $table->decimal('total_ros', 13, 4);
            $table->decimal('total_ex_rate_ros', 13, 4);
            $table->decimal('total_emkl', 13, 4);
            $table->decimal('total_cos', 13, 4);
            $table->decimal('total_ex_rate_cos', 13, 4);
            $table->decimal('total_handling', 13, 4);
            $table->decimal('grand_total_selling', 13, 4);
            $table->decimal('grand_total_buying', 13, 4);
            $table->decimal('profit_loss', 13, 4);
            $table->text('remark')->nullable();
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
