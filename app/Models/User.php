<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'civil_status',
        'religion',
        'education_attainment',
        'phone',
        'profile_pic',
        'present_address',
        'permanent_address',
        'no_of_years',
        'mother_first_name',
        'mother_middle_name',
        'mother_last_name',
        'mother_other_information',
        'hs_first_name',
        'hs_middle_name',
        'hs_last_name',
        'hs_extension',
        'hs_date_of_birth',
        'client_source_income',
        'hs_source_income',
        'total_income',
        'total_ppi_score',
        'email',
        'password',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
