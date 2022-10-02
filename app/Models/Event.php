<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soal;
use App\Models\Sponsor;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    protected $fillable = [
        'id_event','id_sponsor', 'namaevent','poin' ,'tanggal_mulai', 'tanggal_akhir'
    ];
    public function soals(){
        return $this->hasMany(Soal::class);
    }
    public function sponsors(){
        return $this->belongsTo(Sponsor::class,'id_sponsor','id_sponsor');
    }
}
