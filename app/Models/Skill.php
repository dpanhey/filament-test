<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skill_group_id',
        'name',
        'description',
        'check',
        'encumbrance',
        'improvement_cost_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'skill_group_id' => 'integer',
        'check' => 'array',
        'encumbrance' => 'boolean',
        'improvement_cost_id' => 'integer',
    ];

    public function skillGroup(): BelongsTo
    {
        return $this->belongsTo(SkillGroup::class);
    }

    public function improvementCost(): BelongsTo
    {
        return $this->belongsTo(ImprovementCost::class);
    }
}
