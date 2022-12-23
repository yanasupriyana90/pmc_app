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
        Schema::create('job_sheet_heads', function (Blueprint $table) {
            $table->id();
            $table->string('code_jb', 30);
            $table->string('booking_no', 30);
            $table->unsignedBigInteger('shipper_id');
            $table->unsignedBigInteger('undername_id');
            $table->unsignedBigInteger('consignee_id');
            $table->unsignedBigInteger('notify_party_id');
            $table->string('carrier', 50);
            $table->string('vessel', 50);
            $table->date('etd');
            $table->string('pol', 50);
            $table->string('pod', 50);
            $table->date('open_cy');
            $table->date('closing_doc');
            $table->date('closing_cy');
            $table->integer('volume');
            $table->unsignedBigInteger('cont_size_type_id');
            $table->float('qty', 8, 2);
            $table->unsignedBigInteger('type_packaging_id');
            $table->string('commodity_mbl', 50);
            $table->unsignedBigInteger('mbl_type_bl_id');
            $table->string('bl_delivery', 30);
            $table->string('bl_delivery_desc', 50)->nullable();
            $table->string('issue_loc', 30);
            $table->string('commodity_hbl', 50);
            $table->unsignedBigInteger('hbl_type_bl_id');
            $table->float('gross_weight', 8, 2);
            $table->unsignedBigInteger('gross_type_weight_id');
            $table->float('net_weight', 8, 2);
            $table->unsignedBigInteger('net_type_weight_id');
            $table->float('measurement', 8 ,2);
            $table->unsignedBigInteger('type_measurement_id');
            $table->date('stuffing_date');
            $table->string('stuffing_address');
            $table->string('pic_name', 50);
            $table->string('pic_phone', 20);
            $table->string('top', 30);
            $table->unsignedBigInteger('type_payment_id');
            $table->text('remaks')->nullable();
            $table->string('file_shipping_path');
            $table->integer('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('restrict');
            $table->foreign('undername_id')->references('id')->on('undernames')->onDelete('restrict');
            $table->foreign('consignee_id')->references('id')->on('consignees')->onDelete('restrict');
            $table->foreign('notify_party_id')->references('id')->on('notify_parties')->onDelete('restrict');
            $table->foreign('cont_size_type_id')->references('id')->on('container_size_types')->onDelete('restrict');
            $table->foreign('type_packaging_id')->references('id')->on('type_packagings')->onDelete('restrict');
            $table->foreign('mbl_type_bl_id')->references('id')->on('type_bill_of_ladings')->onDelete('restrict');
            $table->foreign('hbl_type_bl_id')->references('id')->on('type_bill_of_ladings')->onDelete('restrict');
            $table->foreign('gross_type_weight_id')->references('id')->on('type_weights')->onDelete('restrict');
            $table->foreign('net_type_weight_id')->references('id')->on('type_weights')->onDelete('restrict');
            $table->foreign('type_measurement_id')->references('id')->on('type_measurements')->onDelete('restrict');
            $table->foreign('type_payment_id')->references('id')->on('type_payments')->onDelete('restrict');
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
        Schema::table('job_sheet_heads', function (Blueprint $table) {
            $table->dropForeign(['shipper_id']);
            $table->dropForeign(['undername_id']);
            $table->dropForeign(['consignee_id']);
            $table->dropForeign(['notify_party_id']);
            $table->dropForeign(['cont_size_type_id']);
            $table->dropForeign(['type_packaging_id']);
            $table->dropForeign(['mbl_type_bl_id']);
            $table->dropForeign(['hbl_type_bl_id']);
            $table->dropForeign(['gross_type_weight_id']);
            $table->dropForeign(['net_type_weight_id']);
            $table->dropForeign(['type_measurement_id']);
            $table->dropForeign(['type_payment_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('job_sheet_heads');
    }
};
