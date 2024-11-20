<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_masuk');
            $table->integer('jml_masuk');
            $table->integer('id_supplier');
            $table->timestamps();

            // Relasi ke tabel barang
            $table->unsignedInteger('id_barang')->references('id_barang')->on('barangs')->onDelete('cascade');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
