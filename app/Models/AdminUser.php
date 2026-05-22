<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'role', 'is_active', 'last_login'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['is_active' => 'boolean', 'last_login' => 'datetime'];
}
