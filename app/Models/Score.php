<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function pinball()
    {
        return $this->belongsTo(Pinball::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
