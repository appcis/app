<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sms
 * @package App\Models
 * @property-read int $id
 * @property string $message
 */
class Sms extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}
