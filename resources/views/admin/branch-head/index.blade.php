<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Branch Heads</h5>
                            <a href="{{route('admin.branch-head.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branch_heads as $bh)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{optional($bh->branch)->name}}</td>
                                    <td>{{$bh->name}}</td>
                                    <td>{{$bh->email}}</td>
                                    <td><a href="{{ route('admin.branch-head.edit', [$bh->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('admin.branch-head.destroy', [$bh->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
