<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CloseCombatWeapon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'weapon_type_id',
        'combat_technique_id',
        'conductive_property',
        'damage_threshold',
        'damage_points',
        'attack_modification',
        'parry_modification',
        'reach',
        'weight',
        'cost',
        'url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'weapon_type_id' => 'integer',
        'combat_technique_id' => 'integer',
        'weight' => 'decimal:2',
        'cost' => 'decimal:2',
    ];

    public function weaponType(): BelongsTo
    {
        return $this->belongsTo(WeaponType::class);
    }

    public function combatTechnique(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CombatTechniques::class);
    }
}
