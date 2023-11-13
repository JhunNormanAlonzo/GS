<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentGradePerSubjectExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{


    private $student_id;
    private $year_level_id;
    private $section_id;
    public function __construct($student_id, $year_level_id, $section_id)
    {
        $this->student_id = $student_id;
        $this->year_level_id = $year_level_id;
        $this->section_id = $section_id;
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
    public function query()
    {
        $student_id = $this->student_id;
        $year_level_id = $this->year_level_id;
        $section_id = $this->section_id;

        $grade = Grade::where('student_id', $student_id)
            ->where('section_id', $section_id)
            ->where('year_level_id', $year_level_id)->first();

        return $grade;
    }

    public function map($row): array
    {
        $status = $row->average <= 74.50 ? "FAILED" : "PASSED";
        return [
            $row->subject->code,
            $row->subject->name,
            $row->first_grading,
            $row->second_grading,
            $row->third_grading,
            $row->fourth_grading,
            $row->average,
            $status
        ];
    }

    public function headings(): array
    {
        return [
            'Code',
            'Subject',
            'First Grading',
            'Second Grading',
            'Third Grading',
            'Fourth Grading',
            'Average',
            'Status'
        ];
    }
}
