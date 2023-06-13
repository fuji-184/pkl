<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $table = 'pegawai';
     
    protected $fillable = [
        'user_id',
        'nama_beserta_gelar',
        'nip',
        'jabatan',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'foto'
    ];
}
