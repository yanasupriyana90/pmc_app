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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('restrict');
            $table->date('tanggal_pembelian');
            $table->string('nomor_invoice')->unique();
            $table->decimal('total_harga', 15, 2);
            $table->text('keterangan')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
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
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropForeign(['vendor_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('barang_masuks');
    }
};
