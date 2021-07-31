<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Sms
 * @package App\Models
 * @property-read int $id
 * @property string $message
 * @property Collection $agents
 * @property User $user
 * @property string $etat_envoi
 */

class Sms extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'etat_envoi'];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setEtatEnvoiAttribute($value)
    {
        $etat_valide = ['ATTENTE', 'EN_COURS', 'ENVOYE', 'ERREUR'];
        if (!in_array($value, $etat_valide)) {
            throw new \Exception('Etat invalide');
        }
        $this->attributes['etat_envoi'] = $value;
    }
}
