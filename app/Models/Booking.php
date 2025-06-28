<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'nama_ruangan',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'keperluan',
        'user_id', // ⬅️ Tambahkan ini
    ];
}
