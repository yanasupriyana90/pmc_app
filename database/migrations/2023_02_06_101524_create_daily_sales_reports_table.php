<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sales_reports', function (Blueprint $table) {
            $table->id();
            $table->string('code_daily_sales_report', 12);
            $table->date('date_report');
            $table->string('shipper');
            $table->string('address');
            $table->string('pic_name', 50)->nullable();
            $table->string('phone_1', 20);
            $table->string('phone_2', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('commodity')->nullable();
            $table->string('destination')->nullable();
            $table->text('remarks')->nullable();
            $table->string('status');
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
        Schema::table('daily_sales_reports', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('daily_sales_reports');
    }
};
