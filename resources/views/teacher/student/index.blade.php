<x-teacher-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Students</h5>
                            <a href="{{route('admin.student.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
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

</x-teacher-layout>
