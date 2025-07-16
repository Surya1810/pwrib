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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('penguruses_id')->constrained()->onDelete('cascade');
            $table->string('nomor');
            $table->string('nama');
            $table->string('telp');
            $table->string('media');
            $table->string('jenis_keanggotaan');
            $table->date('masa_berlaku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
