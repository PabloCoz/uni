<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }
}
