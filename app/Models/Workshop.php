<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function goals()
    {
        return $this->morphMany(Goal::class, 'goalable');
    }
}
