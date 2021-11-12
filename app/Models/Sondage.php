<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property-read int $id
 * @property string $libelle
 * @property string $description
 * @property array $dates Date auxquelles se rapporte le sondage
 * @property array $reponses Reponses possible au sondage
 * @property Collection $agents
 */
class Sondage extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description', 'dates', 'reponses'];

    protected $casts = [
        'libelle' => 'string',
        'description' => 'string',
        'dates' => 'array',
        'reponses' => 'array'
    ];

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class);
    }
}
