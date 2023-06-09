<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function workshops()
    {
        return $this->belongsToMany(Workshop::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
