<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'character_id',
        'courage',
        'sagacity',
        'intuition',
        'charisma',
        'dexterity',
        'agility',
        'constitution',
        'strength',
        'life_points',
        'arcane_energy',
        'karma_points',
        'spirit',
        'toughness',
        'dodge',
        'initiative',
        'movement',
        'fate_points',
        'carrying_capacity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'character_id' => 'integer',
    ];

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
