<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Subject</h5>
                            <a href="{{route('admin.subject.create')}}" class="btn btn-sm btn-primary mb-3">Add </a>
                          <table class="table" id="table">
                            <thead>
                                <tr>
{{--                                    <th>#</th>--}}
                                    <th>YearLevel</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                <tr>
{{--                                    <td>{{$loop->iteration}}</td>--}}
                                    <td>{{$subject->yearlevel->name}}</td>
                                    <td>{{$subject->code}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td><a href="{{ route('admin.subject.edit', [$subject->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('admin.subject.destroy', [$subject->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
