<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CombatTechniques extends Model
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
        'primary_attribute',
        'improvement_cost_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'primary_attribute' => 'array',
        'improvement_cost_id' => 'integer',
    ];

    public function improvementCost(): BelongsTo
    {
        return $this->belongsTo(ImprovementCost::class);
    }
}
