<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->first();
    }

    public function hasAnyRole( array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order')->orderBy('orders.created_at', 'DESC');

    }
    public function orders_service()
    {
        return $this->hasMany('App\Models\Order_Service');
    }
    
}