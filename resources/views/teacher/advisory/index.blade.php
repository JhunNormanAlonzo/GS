<x-admin-layout>
    @section('content')
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Advisory Class Section '{{$section}}'</h5>

                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>View</th>
                                    <th>Lrn</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>YearLevel</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advisories as $student)
                                <tr>
                                    <td>
                                        <form action="{{route('dl.grade')}}" method="POST">
                                            @csrf
                                            @method("POST")
                                            <input type="text" name="student_id" hidden value="{{$student->id}}">
                                            <button class="btn btn-sm btn-primary">View Grades</button>
                                        </form>

                                    </td>
                                    <td>{{$student->lrn_no}}</td>
                                    <td>{{$student->user->name}}</td>
                                    <td>{{$student->user->email}}</td>
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

</x-admin-layout>
