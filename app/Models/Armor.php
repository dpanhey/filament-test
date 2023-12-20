<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'armor_type',
        'name',
        'description',
        'protection',
        'encumbrance',
        'additional_penalties',
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
        'weight' => 'decimal:2',
        'cost' => 'decimal:2',
    ];
}
