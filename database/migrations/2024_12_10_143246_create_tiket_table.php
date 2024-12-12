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
        Schema::create('tiket', function (Blueprint $table) {
            $table->id('id_tiket');
            $table->foreignId('id_jadwal')->constrained('jadwal', 'id_jadwal')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('jumlah_tiket');
            $table->double('harga');
            $table->dateTime('waktu_pesan_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
