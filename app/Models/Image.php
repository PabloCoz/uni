<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación uno a uno polimórfica

    public function imageable()
    {
        return $this->morphTo();
    }
}
