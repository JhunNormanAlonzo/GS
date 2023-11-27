<?php

namespace App\Models;

use App\Models\Scopes\ActiveSchoolYearScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveSchoolYearScope());
    }

}