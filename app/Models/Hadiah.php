<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HadiahHistory;

class Hadiah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function hadiah_histories(){
        return $this->hasMany(HadiahHistory::class);
    }
}
