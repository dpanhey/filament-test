<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpellRitual extends Model
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
        'effect',
        'check',
        'ae_cost',
        'casting_time',
        'range',
        'duration',
        'target_category',
        'property_id',
        'improvement_cost_id',
        'url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'check' => 'array',
        'property_id' => 'integer',
        'improvement_cost_id' => 'integer',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function improvementCost(): BelongsTo
    {
        return $this->belongsTo(ImprovementCost::class);
    }
}
