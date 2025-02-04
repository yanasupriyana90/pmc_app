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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 10)->unique();
            $table->string('nama', 50);
            $table->unsignedBigInteger('kategori_barang_id');
            $table->string('merk', 50)->nullable();
            $table->decimal('panjang', 5, 2)->nullable();
            $table->decimal('lebar', 5, 2)->nullable();
            $table->decimal('tinggi', 5, 2)->nullable();
            $table->unsignedBigInteger('satuan_barang_id');
            $table->string('desk')->nullable();
            $table->string('image');
            $table->decimal('harga_modal_usd',15 ,2);
            $table->decimal('exchange',15 ,2);
            $table->decimal('harga_modal_idr',15 ,2);
            $table->decimal('harga_jual',15, 2);
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('kategori_barang_id')->references('id')->on('kategori_barangs')->onDelete('restrict');
            $table->foreign('satuan_barang_id')->references('id')->on('satuan_barangs')->onDelete('restrict');
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
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['kategori_barang_id']);
            $table->dropForeign(['satuan_barang_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('barangs');
    }
};
