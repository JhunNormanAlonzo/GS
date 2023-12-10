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

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveSchoolYearScope());
    }

}
