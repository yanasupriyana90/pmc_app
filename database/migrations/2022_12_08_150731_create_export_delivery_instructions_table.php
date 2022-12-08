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
        Schema::create('export_delivery_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('shipper_id');
            $table->string('undername');
            $table->string('consignee');
            $table->string('notify_party');
            $table->string('port_of_loading');
            $table->date('etd');
            $table->string('port_of_discharge');
            $table->string('shipping_line');
            $table->string('vessels_name');
            $table->string('closing_cy');
            $table->string('bill_of_lading');
            $table->string('desc_of_goods');
            $table->string('cont_size_type_id');
            $table->float('net_weight', 8, 2);
            $table->float('gross_weight', 8, 2);
            $table->float('measurement', 8, 2);
            $table->date('stuffing_date');
            $table->string('warehouse');
            $table->integer('payment_id');
            $table->text('noted');
            $table->integer('status');
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_delivery_instructions');
    }
};
