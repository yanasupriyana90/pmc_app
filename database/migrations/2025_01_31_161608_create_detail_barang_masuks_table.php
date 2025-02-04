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
        Schema::create('detail_barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_masuk_id')->constrained('barang_masuks')->onDelete('cascade'); // Relasi ke tabel purchases
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade'); // Relasi ke tabel produk
            $table->integer('qty'); // Jumlah barang yang dibeli
            $table->decimal('harga_modal_usd',15 ,2);
            $table->decimal('exchange',15 ,2);
            $table->decimal('harga_modal_idr',15 ,2);
            $table->decimal('harga_jual', 15, 2);
            $table->decimal('subtotal', 15, 2); // Total harga produk (quantity * unit_price)
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
        Schema::table('detail_barang_masuks', function (Blueprint $table) {
            $table->dropForeign(['barang_masuk_id']);
            $table->dropForeign(['barang_id']);
        });

        Schema::dropIfExists('detail_barang_masuks');
    }
};
