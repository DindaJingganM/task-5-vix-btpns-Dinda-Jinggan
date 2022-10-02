<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Sponsor extends Model
{
    use HasFactory;
    protected $table = 'sponsors';
    protected $primaryKey = 'id_sponsor';
    protected $fillable = [
        'id_sponsor', 'namasponsor'
    ];
    public function events(){
        return $this->hasMany(Event::class);
    }
}
