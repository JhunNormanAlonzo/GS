<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }
}
