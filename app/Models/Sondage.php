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
 * @property Collection $agents
 */
class Sondage extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'description'];

    public function agents(): BelongsToMany
    {
        return $this->belongsToMany(Agent::class);
    }
}
