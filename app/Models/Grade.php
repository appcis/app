<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grade
 * @package App\Models
 * @property-read int $id
 * @property string $lib_court
 * @property string $lib_long
 * @property string $img
 * @property int $ordre
 */
class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['lib_court', 'lib_long', 'img', 'ordre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
