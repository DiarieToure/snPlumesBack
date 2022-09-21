<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;    

class Admin extends Model
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'adresse'
    ];
}
