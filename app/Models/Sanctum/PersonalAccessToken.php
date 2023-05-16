<?php

namespace App\Models\Sanctum;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'tokenable_type',	
      'tokenable_id',
      'name',
      'token',
      'abilities',
      'last_used_at',
      'created_at',
      'updated_at'	
    ];
}