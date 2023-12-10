<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Admin</h5>
                            <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-primary mb-3">Add </a>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->username}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td><a href="{{ route('admin.user.destroy', [$admin->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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

            $("#table").DataTable();
        </script>
    @endpush

</x-admin-layout>
