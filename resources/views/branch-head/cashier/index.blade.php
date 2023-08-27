<x-branch-head-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Cashiers || {{auth()->user()->branch->name}}</h5>
                           <div class="table-responsive">
                            <a href="{{ route('branch-head.cashier.create') }}" class="btn btn-primary me-3">Create</a>
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Address</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cashiers as $cashier)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$cashier->lastname}}</td>
                                            <td>{{$cashier->firstname}}</td>
                                            <td>{{$cashier->middlename}}</td>
                                            <td>{{$cashier->address}}</td>
                                            <td>
                                                <a href="{{ route('branch-head.cashier.destroy', [$cashier->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
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
            var table = $("#table").DataTable({
                searching: true,
                processing: true,
                lengthMenu: [[10, 25, 50, 100, -1],[ 10, 25, 50, 100, "All"]],
                dom: '<"top border p-3 rounded  table-responsive  mt-3 d-flex justify-content-between mb-3"fl><"card card-body border table-responsive"rt><"bottom"p><"clear">',
            });
        </script>
    @endpush

</x-branch-head-layout>
