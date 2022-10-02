<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'soals';
    protected $primaryKey = 'id_soal';
    protected $fillable = [
        'id_soal','id_event', 'soal', 'a', 'b', 'c', 'd','kunci'
    ];

    public function events(){
        return $this->belongsTo(Event::class,'id_event','id_event');
    }
}
