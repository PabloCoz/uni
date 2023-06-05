<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $withCount = ['students'];

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

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Module::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function goals()
    {
        return $this->morphMany(Goal::class, 'goalable');
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)->withPivot('archived');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
