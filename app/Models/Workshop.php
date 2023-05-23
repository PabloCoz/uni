<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Workshop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const ELABORACION = 1;
    const PUBLICADO = 2;

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getExcerptAttribute()
    {
        return substr($this->description, 0, 80) . "...";
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function goals(): MorphMany
    {
        return $this->morphMany(Goal::class, 'goalable');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
