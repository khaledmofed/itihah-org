<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipRequest extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'country',
        'specialty', 'experience', 'notes', 'status',
    ];
}
