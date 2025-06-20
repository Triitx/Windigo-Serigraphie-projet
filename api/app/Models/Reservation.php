<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Workshop_sessions_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(WorkshopSession::class);
    }
}
