<x-teacher-layout>
    @section('content')

        <div class="container">
            @php
                $uniqueSections = $students->unique('section');
            @endphp
            <div class="row">
                @foreach($uniqueSections as $section)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title"> {{ $section->section->name }} - {{$subject->code}} - {{$subject->name}} </h5>
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Lrn</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Section</th>
                                        <th>YearLevel</th>
                                        <th>Address</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students->where('section', $section->section) as $student)
                                        @php
                                            $teacher_id = Auth::user()->teacher->id;
                                            $grade_existing = App\Models\Grade::where('student_id', $student->id)
                                                ->where('year_level_id', $subject->year_level_id)
                                                ->where('section_id', $student->section_id)
                                                ->where('subject_id', $subject->id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-danger"  onclick="event.preventDefault(); dropConfirm({{ $student->user->id }});">Drop Out</a>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#setGrade{{$student->id}}" class="btn btn-sm btn-outline-primary">grade</button>
                                                <div class="modal fade" id="setGrade{{$student->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{route('teacher.set-grade.student.subject', ['student_id' => $student->id, 'subject_id' => $subject->id])}}" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="modal-header">
                                                                    Set Grade
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-title">
                                                                        {{$subject->name}} | {{$subject->code}}
                                                                        <div class="row mt-3">
                                                                            <div class="col-12 mb-2">
                                                                                <x-input id="first_grading" required min="0" max="100"  name="first_grading" type="number" step="0.01"  placeholder="First Grading" value="{{ $grade_existing->first_grading ?? 0 }}">
                                                                                    <x-validation-error name="first_grading"></x-validation-error>
                                                                                </x-input>
                                                                            </div>
                                                                            <div class="col-12 mb-2">
                                                                                <x-input id="second_grading" required min="0" max="100" name="second_grading" type="number" step="0.01" placeholder="Second Grading" value="{{ $grade_existing->second_grading ?? 0  }}">
                                                                                    <x-validation-error name="second_grading"></x-validation-error>
                                                                                </x-input>
                                                                            </div>
                                                                            <div class="col-12 mb-2">
                                                                                <x-input id="third_grading" required min="0" max="100" name="third_grading" type="number" step="0.01" placeholder="Third Grading" value="{{ $grade_existing->third_grading ?? 0 }}">
                                                                                    <x-validation-error name="third_grading"></x-validation-error>
                                                                                </x-input>
                                                                            </div>
                                                                            <div class="col-12 mb-2">
                                                                                <x-input id="fourth_grading" required min="0" max="100" name="fourth_grading" type="number" step="0.01" placeholder="Fourth Grading" value="{{ $grade_existing->fourth_grading ?? 0 }}">
                                                                                    <x-validation-error name="fourth_grading"></x-validation-error>
                                                                                </x-input>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                                                                    <button class="btn btn-primary">Save Grade</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$student->lrn_no}}</td>
                                            <td>{{$student->user->name}}</td>
                                            <td>{{$student->user->email}}</td>
                                            <td>{{$student->section->name}}</td>
                                            <td>{{$student->yearLevel->name}}</td>
                                            <td>{{$student->address}}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endsection

    @section('footer')

    @endsection




    @push('scripts')
        <script>
            function dropConfirm(studentId){
                Swal.fire({
                    title: 'Drop Student!',
                    text: 'Are you sure you want to drop this student?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Drop Out'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.href = "{{ route('teacher.teacher-student.drop', ':id') }}".replace(':id', studentId);
                    }
                });
            }

            $(".table").DataTable();
        </script>
    @endpush

</x-teacher-layout>
