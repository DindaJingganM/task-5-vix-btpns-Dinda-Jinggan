<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKunjungan extends Model
{
    use HasFactory;
    protected $table = 'buku_kunjungans';
    protected $fillable = [
        'nama', 'alamat', 'jumlahpengunjung', 'nomorhp'
    ];
}
