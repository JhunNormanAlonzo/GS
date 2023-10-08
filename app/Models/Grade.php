<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function yearLevel(){
        return $this->belongsTo(YearLevel::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function computeAverage($studentId)
    {
        $studentGrades = $this->where('student_id', $studentId)->pluck('average');

        if ($studentGrades->isEmpty()) {
            return 0;
        }

        $average = $studentGrades->average();

        return $average;
    }
}
