<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopSession extends Model
{
    use HasFactory;

    protected $fillable = [
    'session_number',
    'capacity',
    'workshop_id'
    ];

    public function Workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function reservationUsers()
    {
        return $this->hasMany(User::class);
    }
}
