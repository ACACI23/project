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
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id_barang'); // Set as auto-increment primary key
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->string('lokasi');
            $table->string('kondisi');
            $table->integer('jumlah_barang');
            $table->string('sumber_dana');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
