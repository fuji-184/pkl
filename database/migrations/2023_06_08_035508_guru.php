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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
        
            $table->string('nama_beserta_gelar');
            $table->string('nip');
            $table->enum('jabatan', ['Kepala Sekolah', 'Guru', 'Pegawai']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('foto');
            
            $table->timestamps();
            
        });}
     
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
