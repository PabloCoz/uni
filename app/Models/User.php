<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'username',
        'password',
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
    ];

    public function courses_dictated()
    {
        return $this->hasMany(Course::class);
    }

    public function courses_enrolled()
    {
        return $this->belongsToMany(Course::class);
    }

    public function workshops_dictated()
    {
        return $this->hasMany(Workshop::class);
    }

    public function workshops_enrolled()
    {
        return $this->belongsToMany(Workshop::class);
    }

    public function trainings_dictated()
    {
        return $this->hasMany(Training::class);
    }

    public function trainings_enrolled()
    {
        return $this->belongsToMany(Training::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
