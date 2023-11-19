<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Students</h5>
                            <a href="{{route('teacher.add.student.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
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
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->lrn_no}}</td>
                                    <td>{{$student->user->name}}</td>
                                    <td>{{$student->user->email}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td>{{$student->yearLevel->name}}</td>
                                    <td>{{$student->address}}</td>
                                    <td><a href="{{ route('teacher.add.student.edit', [$student->user->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('teacher.add.student.destroy', [$student->user->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
