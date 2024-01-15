
@php
    $fullname = "Jhun Norman Alonzo";
    $grade_section = "10 - FARADAY";
    $lrn = "10 - FARADAY";
    $gender = "10 - FARADAY";
    $age = "10 - FARADAY";
    $school_year = "10 - FARADAY";



    $subjects = array(
        'english',
        'math',
        'filipino',
        'science',
        'gmrc',
        'ap',
        'mapeh',
        'pe',
    );
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
            <strong>Name: {{$fullname}} </strong>
        </td>
        <td colspan="4">
            <strong>Grade and Section: {{$grade_section}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <strong>LRN: {{$lrn}}</strong>
        </td>
        <td colspan="4">
            <strong>Sex: {{$gender}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <strong>Age: {{$age}}</strong>
        </td>
        <td colspan="4">
            <strong>School Year: {{$school_year}} </strong>
        </td>
    </tr>

    <tr>
        <td colspan="7" style="text-align: center;">
            <strong>
                Report on Learning Progress and Achievement
            </strong>
        </td>
    </tr>




    @foreach($subjects as $subject)
        <tr>
            <td>{{$subject}}</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
            <td>10</td>
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


