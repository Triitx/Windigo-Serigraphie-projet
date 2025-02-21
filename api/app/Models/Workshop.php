<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price',
        'duration',
        'age'
    ];

    public function workshopSessions()
    {
        return $this->hasMany(WorkshopSession::class);
    }
}
