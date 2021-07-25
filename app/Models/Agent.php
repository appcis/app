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
 * @property Grade $grade
 */
class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'phone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function sms()
    {
        return $this->belongsToMany(Sms::class);
    }
}
