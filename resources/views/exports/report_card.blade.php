
@php
    $fullname = "Jhun Norman Alonzo";
    $grade_section = "10 - FARADAY";
    $lrn = "10 - FARADAY";
    $gender = "10 - FARADAY";
    $age = "10 - FARADAY";
    $school_year = "10 - FARADAY";
@endphp

<table border="1">
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                    Republic of the Philippines
            </strong>
        </th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                Department of Education
            </strong>
        </th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                Region II
            </strong>
        </th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                Division of Cagayan
            </strong>
        </th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                BUKIG NATIONAL AGRICULTURAL AND TECHNICAL SCHOOL
            </strong>
        </th>
    </tr>
    <tr>
        <th colspan="7" style="text-align: center;">
            <strong>
                Bukig, Aparri, Cagayan
            </strong>
        </th>
    </tr>

    <tr>
        <td colspan="3">
            <strong>Name: {{$student->user->name}} </strong>
        </td>
        <td colspan="4">
            <strong>Grade and Section: {{$student->yearLevel->name | $student->section->name}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <strong>LRN: {{$student->lrn_no}}</strong>
        </td>
        <td colspan="4">
            <strong>Sex: {{$student->user->gender}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <strong>Age: {{$student->user->age}}</strong>
        </td>
        <td colspan="4">
            <strong>School Year: {{$activeSchoolYearName}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="7" style="text-align: center;">
            <strong>
                Report on Learning Progress and Achievement
            </strong>
        </td>
    </tr>




    @foreach($grades as $grade)
        <tr>
            <td>{{$grade->subject->name}}</td>
            <td>{{$grade->first_grading}}</td>
            <td>{{$grade->second_grading}}</td>
            <td>{{$grade->third_grading}}</td>
            <td>{{$grade->fourth_grading}}</td>
            <td>{{$grade->average}}</td>
            <td>{{($grade->average <= 74) ? "failed" : "passed"}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Learning Modality</td>
        <td colspan="3">{{"FACE TO FACE"}}</td>

    </tr>


    <tr>
        <td colspan="7">
            <em>Dear Parent:
                This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values. The school welcomes you, should you desire to know more about your child’s progress.
            </em>
        </td>
    </tr>

    <tr>
        <td style="text-align: center" colspan="4">EMERSON C. MADRIAGA</td>
        <td style="text-align: center" colspan="3">JONAH JOYCE R. URBI</td>
    </tr>
    <tr>
        <td style="text-align: center" colspan="4">Adviser</td>
        <td style="text-align: center" colspan="3">Principal II</td>
    </tr>
</table>


