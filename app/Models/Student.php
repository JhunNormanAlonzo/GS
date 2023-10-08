<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }

    public function getAverageGradeAttribute()
    {
        if ($this->grades->isEmpty()) {
            return 0; // Return 0 if there are no grades for the student
        }

        return $this->grades->avg('average');
    }
}
