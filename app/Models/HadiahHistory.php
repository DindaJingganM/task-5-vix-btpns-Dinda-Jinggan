<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hadiah;

class HadiahHistory extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Koneksi Voucher
     * Mengkoneksikan antara vouchers_history ke voucher
     * 
     * @return Illuminate\Support\Facades\DB
     * @see https://laravel.com/docs/9.x/eloquent-relationships#one-to-one-defining-the-inverse-of-the-relationship
     */
    function hadiahs()
    {
        return $this->belongsTo(Hadiah::class,'hid','hid');
    }
}
