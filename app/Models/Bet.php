<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $game_id
 * @property int $amount
 * @property int $income
 * @property string $status
 * @property int $result
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Bet extends Model
{
    use HasFactory;

    const STATUS = [
        'won' => 'won',
        'lost' => 'lost',
        'canceled' => 'canceled',
        'pending' => 'pending',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => self::STATUS['pending'],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'game_id',
        'amount',
        'result',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($bet) {
            $bet->income = $bet->calculateIncome();
            User::findOrFail($bet->user_id)->updateBalance(-$bet->amount);
        });
    }

    private function calculateIncome()
    {
        $game = Game::findOrFail($this->game_id);
        switch ($this->result) {
            case -1:
                $coefficient = $game->left_coefficient;
                break;
            case 1:
                $coefficient = $game->right_coefficient;
                break;
            case 0:
                $coefficient = $game->draw_coefficient;
                break;
        }
        return $this->amount * $coefficient * (1 - $game->margin / 100);
    }
}
