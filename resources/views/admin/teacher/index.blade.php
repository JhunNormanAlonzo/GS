<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Teachers</h5>
                            <a href="{{route('admin.teacher.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EmpNo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Section</th>
                                    <th>Address</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$teacher->emp_no}}</td>
                                    <td>{{$teacher->user->name}}</td>
                                    <td>{{$teacher->user->email}}</td>
                                    <td>{{$teacher->section->name}}</td>
                                    <td>{{$teacher->address}}</td>
                                    <td><a href="{{ route('admin.teacher.edit', [$teacher->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('admin.teacher.destroy', [$teacher->user->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
