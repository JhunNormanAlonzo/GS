<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title mb-2">Teacher Subjects</h5>

                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EmpNo</th>
                                    <th>Name</th>
                                    <th>Assign</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$teacher->emp_no}}</td>
                                    <td>{{$teacher->user->name}}</td>
                                    <td>
                                        <span type="button" data-bs-toggle="modal" data-bs-target="#teacher_subject{{$teacher->id}}" style="cursor: pointer; user-select: none;" class="bg-primary badge">Subjects</span>
                                        <div class="modal fade" id="teacher_subject{{$teacher->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('admin.teacher-subject.store')}}" method="POST">
                                                        @csrf
                                                        @method("POST")
                                                        <input type="text" name="teacher_id" hidden readonly value="{{$teacher->id}}">
                                                        <div class="modal-header">
                                                            Assign Subjects
                                                            <button data-bs-dismiss="modal" type="button" class="btn btn-sm btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Pick subject for teacher</p>
                                                                <table class="table">
                                                                    <thead>
                                                                        <th>Switch</th>
                                                                        <th>Year Level</th>
                                                                        <th>Subject</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($subjects as $subject)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input" name="subject[]" value="{{$subject->id}}" type="checkbox" @if($teacher->subjects->contains($subject->id)) checked @endif>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{$subject->yearLevel->name}}</td>
                                                                                <td>{{$subject->name}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
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

    @endsection

    @section('footer')

    @endsection




    @push('scripts')
        <script>
            $("#table").DataTable();
        </script>
    @endpush

</x-admin-layout>
