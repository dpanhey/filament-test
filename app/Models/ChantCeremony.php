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
        'effect',
        'check',
        'kp_cost',
        'liturgical_time',
        'range',
        'duration',
        'target_category',
        'aspect_group',
        'aspect',
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
        'improvement_cost_id' => 'integer',
    ];

    public function improvementCost(): BelongsTo
    {
        return $this->belongsTo(ImprovementCost::class);
    }
}