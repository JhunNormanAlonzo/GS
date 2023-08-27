<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Branches</h5>
                            <a href="{{route('admin.branch.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$branch->name}}</td>
                                    <td><a href="{{ route('admin.branch.edit', [$branch->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('admin.branch.destroy', [$branch->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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

    @section('scripts')



    <script>
        $("#table").DataTable();
    </script>
    @endsection
</x-admin-layout>
