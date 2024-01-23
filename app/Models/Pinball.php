<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Pinball extends Model
{
    use HasFactory;

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class)->orderBy('value', 'desc');
    }

    public function bestScore(): ?Score
    {
        return $this->scores()->first();
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }
}
