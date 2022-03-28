<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tournament_id
 * @property int $left_team_id
 * @property int $right_team_id
 * @property int $margin
 * @property float $left_coefficient
 * @property float $right_coefficient
 * @property boolean $is_draw_possible
 * @property ?float $draw_coefficient
 * @property DateTime $starts_at
 * @property ?int $result
 * @property ?string $score
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'left_team_id',
        'right_team_id',
        'margin',
        'left_coefficient',
        'right_coefficient',
        'is_draw_possible',
        'draw_coefficient',
        'starts_at',
        'result',
        'score',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'starts_at' => 'datetime',
    ];
}
