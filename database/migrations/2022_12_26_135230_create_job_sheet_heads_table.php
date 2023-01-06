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
        Schema::create('job_sheet_heads', function (Blueprint $table) {
            $table->id();
            $table->string('code_js', 20);
            $table->string('booking_no', 20)->nullable();
            $table->unsignedBigInteger('shipper_id');
            $table->unsignedBigInteger('undername_mbl_id')->nullable();
            $table->unsignedBigInteger('undername_hbl_id')->nullable();
            $table->string('name_cons');
            $table->string('address_cons');
            $table->string('phone_1_cons', 20);
            $table->string('phone_2_cons', 20)->nullable();
            $table->string('fax_cons', 20)->nullable();
            $table->string('email_cons')->nullable();
            $table->unsignedBigInteger('mandatory_tax_id_cons');
            $table->string('tax_id_cons', 35)->nullable();
            $table->string('same_as_consignee', 20)->nullable();
            $table->string('name_notify')->nullable();
            $table->string('address_notify')->nullable();
            $table->string('phone_1_notify', 20)->nullable();
            $table->string('phone_2_notify', 20)->nullable();
            $table->string('fax_notify', 20)->nullable();
            $table->string('email_notify')->nullable();
            $table->unsignedBigInteger('mandatory_tax_id_notify')->nullable();
            $table->string('tax_id_notify', 35)->nullable();
            $table->string('carrier', 50)->nullable();
            $table->string('vessel', 50)->nullable();
            $table->date('etd')->nullable();
            $table->string('pol', 50)->nullable();
            $table->string('pod', 50)->nullable();
            $table->timestamp('open_cy')->nullable();
            $table->timestamp('closing_doc')->nullable();
            $table->timestamp('closing_cy')->nullable();
            $table->integer('volume');
            $table->unsignedBigInteger('cont_size_type_id');
            $table->float('qty', 8, 2);
            $table->unsignedBigInteger('type_packaging_id');
            $table->float('gross_weight', 8, 2);
            $table->unsignedBigInteger('gross_type_weight_id');
            $table->float('net_weight', 8, 2);
            $table->unsignedBigInteger('net_type_weight_id');
            $table->float('measurement', 8 ,2);
            $table->unsignedBigInteger('type_measurement_id');
            $table->string('commodity_mbl', 50);
            $table->string('hs_code_mbl', 15)->nullable();
            $table->unsignedBigInteger('mbl_type_bl_id');
            // $table->string('bl_delivery', 30);
            // $table->string('bl_delivery_desc', 50)->nullable();
            // $table->string('issue_loc', 30);
            $table->string('commodity_hbl', 50)->nullable();
            $table->string('hs_code_hbl', 15)->nullable();
            $table->unsignedBigInteger('hbl_type_bl_id');
            $table->date('stuffing_date')->nullable();
            $table->string('stuffing_address');
            $table->string('pic_name', 50);
            $table->string('pic_phone', 20);
            $table->string('top', 30);
            $table->unsignedBigInteger('type_payment_id');
            $table->text('remarks')->nullable();
            $table->string('si_doc', 100);
            $table->integer('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('restrict');
            $table->foreign('undername_mbl_id')->references('id')->on('undername_mbls')->onDelete('restrict');
            $table->foreign('undername_hbl_id')->references('id')->on('undername_hbls')->onDelete('restrict');
            $table->foreign('cont_size_type_id')->references('id')->on('container_size_types')->onDelete('restrict');
            $table->foreign('type_packaging_id')->references('id')->on('type_packagings')->onDelete('restrict');
            $table->foreign('gross_type_weight_id')->references('id')->on('type_weights')->onDelete('restrict');
            $table->foreign('net_type_weight_id')->references('id')->on('type_weights')->onDelete('restrict');
            $table->foreign('type_measurement_id')->references('id')->on('type_measurements')->onDelete('restrict');
            $table->foreign('mbl_type_bl_id')->references('id')->on('type_bill_of_ladings')->onDelete('restrict');
            $table->foreign('hbl_type_bl_id')->references('id')->on('type_bill_of_ladings')->onDelete('restrict');
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
            $table->dropForeign(['undername_mbl_id']);
            $table->dropForeign(['undername_hbl_id']);
            $table->dropForeign(['cont_size_type_id']);
            $table->dropForeign(['type_packaging_id']);
            $table->dropForeign(['gross_type_weight_id']);
            $table->dropForeign(['net_type_weight_id']);
            $table->dropForeign(['type_measurement_id']);
            $table->dropForeign(['mbl_type_bl_id']);
            $table->dropForeign(['hbl_type_bl_id']);
            $table->dropForeign(['type_payment_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('job_sheet_heads');
    }
};
