<x-admin-layout>
    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List of Students in {{$subject->name}} subject</h5>
                            <div class="badge bg-info mb-3">
                                {{$teacher->user->name}}
                            </div>
                            <div class="badge bg-info mb-3">
                                SY : {{$active_school_year->name}}
                            </div>
                            @php
                                $array = [
                                    'subject_id' => $subject->id,
                                    'teacher_id' => $teacher->id,
                                    'active_school_year_id' => $active_school_year->id
                                ];
                            @endphp

                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lrn</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Section</th>
                                            <th>YearLevel</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacher_students as $ts)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$ts->student->lrn_no}}</td>
                                            <td>{{$ts->student->user->name}}</td>
                                            <td>{{$ts->student->user->email}}</td>
                                            <td>{{$ts->student->section->name}}</td>
                                            <td>{{$ts->student->yearLevel->name}}</td>
                                            <td>{{$ts->student->address}}</td>
                                            <td>
                                                @if(!$ts->is_dropout)
                                                    <button  type="button" data-bs-toggle="modal" data-bs-target="#setGrade{{$ts->student->id}}" class="btn btn-danger btn-sm" >Grade</button>
                                                    <a type="button" onclick="event.preventDefault(); dropConfirm({{$ts->id}}, {{$ts->is_dropout}})" class="btn btn-secondary btn-sm">Drop</a>
                                                    @php
                                                        $teacher_id = auth()->user()->teacher->id;
                                                        $grade_existing = App\Models\Grade::where('teacher_student_id', $ts->id)
                                                            ->where('year_level_id', $subject->year_level_id)
                                                            ->where('section_id', $ts->student->section_id)
                                                            ->where('subject_id', $subject->id)->first();
                                                    @endphp
                                                    <div  class="modal fade" id="setGrade{{$ts->student->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{route('teacher.set-grade.student.subject', ['student_id' => $ts->student->id, 'subject_id' => $subject->id])}}" method="POST">
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
                                                                                    <input type="text" hidden name="teacher_student_id" value="{{$ts->id}}">
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
                                                @else
                                                    <button  class="btn btn-secondary btn-sm" type="button" onclick="event.preventDefault(); dropConfirm({{$ts->id}}, {{$ts->is_dropout}})" >Dropped Out</button>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center bg-secondary-light mt-3 rounded">List of all students</h5>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lrn</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Section</th>
                                        <th>YearLevel</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($all_students as $all_student)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$all_student->lrn_no}}</td>
                                            <td>{{$all_student->user->name}}</td>
                                            <td>{{$all_student->user->email}}</td>
                                            <td>{{$all_student->section->name}}</td>
                                            <td>{{$all_student->yearLevel->name}}</td>
                                            <td>
                                                <form action="{{route('teacher.teacher-student.add-to-class')}}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="text" hidden="" readonly name="student_id" value="{{$all_student->id}}">
                                                    <input type="text" hidden="" readonly name="subject_id" value="{{$subject->id}}">
                                                    <button type="submit" class="btn btn-sm btn-outline-dark">Add to this class</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection

    @section('footer')

    @endsection




    @push('scripts')
        <script>
            function dropConfirm(teacherStudentId, isDrop){
                var text = !isDrop
                    ? "Are you sure you want to Drop this student?"
                    : "Are you sure you want to Un-drop this student?" ;
                var title = !isDrop
                    ? "Drop"
                    : "Un-drop" ;
                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Drop Out'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.href = "<?php echo e(route('teacher.teacher-student.drop', ':id')); ?>".replace(':id', teacherStudentId);
                    }
                });
            }
            $(".table").DataTable();
        </script>
    @endpush

</x-admin-layout>
