<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS ranked_scores');
        DB::statement(<<<'SQL'
            CREATE VIEW ranked_scores AS
            SELECT
                scores.id as score_id,
                scores.player_id as player_id,
                scores.pinball_id as pinball_id,
                scores.value as value,
                RANK() OVER (

                    PARTITION BY pinball_id ORDER BY value DESC
                ) AS score_position
                FROM scores
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS ranked_scores');
    }
};
