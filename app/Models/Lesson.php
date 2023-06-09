<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_user');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }

}
