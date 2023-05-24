<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
