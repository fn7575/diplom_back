<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $sport_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Tournament extends Model
{
    use HasFactory;
}
