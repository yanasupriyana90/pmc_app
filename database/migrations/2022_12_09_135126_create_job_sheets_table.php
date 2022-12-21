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
        Schema::create('job_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('code_jb');
            $table->string('booking_no');
            $table->integer('shipper_id');
            $table->string('undername');
            $table->string('undname_address');
            $table->string('undname_phone_1');
            $table->string('undname_phone_2');
            $table->string('undname_fax');
            $table->string('undname_email');
            $table->string('undname_npwp');
            $table->string('consignee');
            $table->string('cons_address');
            $table->string('cons_phone_1');
            $table->string('cons_phone_2');
            $table->string('cons_fax');
            $table->string('cons_email');
            $table->string('cons_tax_id');
            $table->string('notify_party');
            $table->string('notify_address');
            $table->string('notify_phone_1');
            $table->string('notify_phone_2');
            $table->string('notify_fax');
            $table->string('notify_email');
            $table->string('notify_tax_id');
            $table->string('carrier');
            $table->string('vessel');
            $table->date('etd');
            $table->string('pol');
            $table->string('pod');
            $table->date('open_cy');
            $table->date('closing_doc');
            $table->date('closing_cy');
            $table->integer('cont_size_type_id');
            $table->string('commodity');
            $table->float('desc_of_good', 8, 2);
            $table->float('gross_weight', 8, 2);
            $table->float('net_weight', 8, 2);
            $table->float('measurement', 8, 2);
            $table->integer('bl_id');
            $table->integer('hbl_id');
            $table->date('stuffing_date');
            $table->string('warehouse');
            $table->integer('payment_id');
            $table->text('remarks');
            $table->integer('user_id');
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
        Schema::dropIfExists('job_sheets');
    }
};
