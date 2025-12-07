<?php

/***/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes hidden from JSON responses.
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Casts for attributes.
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',   // Laravel automatically hashes passwords
  ];
}
