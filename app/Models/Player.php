<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Player extends Model
{
    use HasFactory;

    public function scores()
    {
        return $this->hasMany(Score::class)->orderBy('value', 'desc');
    }

    public function bestScores(): Collection
    {
        return $this
            ->hasMany(Score::class)
            ->join('ranked_scores', 'ranked_scores.score_id', '=', 'scores.id')
            ->orderBy('score_position', 'asc')
            ->where('scores.player_id', $this->id)
            ->select('scores.*', 'score_position as position')
            ->get();
    }
}
