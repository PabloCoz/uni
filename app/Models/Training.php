<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Training extends Model
{
    use HasFactory;

    const ELABORACION = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class. 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class)->withTimestamps();
    }

    public function goals(): MorphMany
    {
        return $this->morphMany(Goal::class, 'goalable');
    }
}
