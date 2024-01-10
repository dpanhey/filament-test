<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted(): void
    {
        static::addGlobalScope('self_only', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'character_name',
        'family',
        'place_of_birth',
        'date_of_birth',
        'age',
        'sex',
        'species_id',
        'size',
        'weight',
        'hair_color',
        'eye_color',
        'culture_id',
        'profession_id',
        'title',
        'social_status',
        'characteristics',
        'backstory',
        'other_information',
        'experience_level_id',
        'total_ap',
        'ap_unused',
        'ap_used',
        'image',
        'alive',
        'character_type_id',
        'character_skill_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'date_of_birth' => 'date',
        'species_id' => 'integer',
        'size' => 'decimal:2',
        'weight' => 'decimal:2',
        'culture_id' => 'integer',
        'profession_id' => 'integer',
        'experience_level_id' => 'integer',
        'alive' => 'boolean',
        'character_type_id' => 'integer',
        'character_skill_id' => 'integer',
    ];

    public function entries(): MorphMany
    {
        return $this->morphMany(Entry::class, 'entryable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function culture(): BelongsTo
    {
        return $this->belongsTo(Culture::class);
    }

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    public function experienceLevel(): BelongsTo
    {
        return $this->belongsTo(ExperienceLevel::class);
    }

    public function characterType(): BelongsTo
    {
        return $this->belongsTo(CharacterType::class);
    }

    public function attributes(): hasOne
    {
        return $this->hasOne(Attribute::class);
    }

    public function advantageCharacters(): hasMany
    {
        return $this->hasMany(AdvantageCharacter::class);
    }

    public function characterDisadvantages(): hasMany
    {
        return $this->hasMany(CharacterDisadvantage::class);
    }

}
