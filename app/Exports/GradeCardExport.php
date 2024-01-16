<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\TeacherStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Http\Request;

class GradeCardExport implements FromView, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {

        $student = Student::find($this->request->student_id);
        $activeSchoolYear = SchoolYear::where('is_active', '1')->first();
        $schoolYear = $activeSchoolYear->id;
        $studentYearLevel = $student->year_level_id;
        $activeSchoolYearName = $activeSchoolYear->name;
        $teacherStudent = TeacherStudent::where('student_id', $this->request->student_id)
        ->where('school_year_id', $schoolYear)
        ->pluck('id');

        $grades = Grade::whereIn('teacher_student_id', $teacherStudent)
        ->get();



        return view('exports.report_card', compact('grades', 'student', 'activeSchoolYearName'));
    }

    public function styles(Worksheet $sheet)
    {
        // TODO: Implement styles() method.
    }


}
