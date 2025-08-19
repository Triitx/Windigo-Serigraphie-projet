<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'billing_address',
        'delivery_address',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => RoleEnum::class,
        ];
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        return $value === 'me' ? Auth::user() : parent::resolveRouteBinding(
            $value,
            $field
        );
    }

    public function IsAdmin()
    {
        return $this->role === RoleEnum::ROLE_ADMIN;
    }

    public function cartProducts()
    {
        return $this->hasMany(Product::class);
    }

    public function customerReviews()
    {
        return $this->hasMany(CustomerReview::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id');
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(City::class, 'delivery_address');
    }

    public function billingAddress()
    {
        return $this->belongsTo(City::class, 'billing_address');
    }

    public function reservationSessions()
    {
        return $this->hasMany(WorkshopSession::class);
    }
}
