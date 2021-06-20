<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Agent
 * @package App\Models
 * @property-read int $id
 * @property string $nom
 * @property string $prenom
 * @property string $phone
 * @property Collection $groupes
 */
class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'phone'];

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }
}
