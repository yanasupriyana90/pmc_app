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
            $table->string('sku', 20);
            $table->string('nama', 50);
            $table->string('merk', 50);
            $table->decimal('panjang', 4, 2)->nullable();
            $table->decimal('lebar', 4, 2)->nullable();
            $table->decimal('tinggi', 4, 2)->nullable();
            $table->integer('qty');
            $table->unsignedBigInteger('satuan_barang_id');
            $table->text('desk')->nullable();
            $table->string('pic');
            $table->decimal('usd', 11, 2);
            $table->decimal('exchange_rate', 11, 2);
            $table->decimal('idr', 11, 2);
            $table->integer('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
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
            $table->dropForeign(['satuan_barang_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('barangs');
    }
};
