<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->unsignedInteger('id_barang'); // Menyesuaikan tipe data dengan id_barang dari barangs
            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('jml_masuk');
            $table->integer('jml_keluar');
            $table->integer('total_barang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};

