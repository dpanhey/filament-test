<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChantCeremony extends Model
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
        'aspect_group',
        'aspect',
        'effect',
        'check',
        'kp_cost',
        'liturgical_time',
        'range',
        'duration',
        'target_category',
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
        'aspect_group' => 'array',
        'aspect' => 'array',
        'check' => 'array',
        'improvement_cost_id' => 'integer',
    ];

    public function improvementCost(): BelongsTo
    {
        return $this->belongsTo(ImprovementCost::class);
    }
}
