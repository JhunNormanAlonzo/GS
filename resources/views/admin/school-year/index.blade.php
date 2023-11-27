<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of School Year</h5>
                            <a href="{{route('admin.school-year.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Activate</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school_years as $school_year)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$school_year->name}}</td>
                                    <td>
                                        @if($school_year->is_active)
                                        <small class="badge bg-success">Active</small>
                                        @else
                                        <small class="badge bg-danger">Closed</small>
                                        @endif

                                    </td>
                                    <td>
                                        @if($school_year->is_active)
                                            <button class="btn btn-secondary btn-sm" disabled="">Activated</button>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" onclick="event.preventDefault(); setActive({{$school_year->id}})">Activate</button>
                                        @endif

                                    </td>
                                    <td><a href="{{ route('admin.school-year.edit', [$school_year->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                    <td><a href="{{ route('admin.school-year.destroy', [$school_year->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
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
            function setActive(schoolYear){
                Swal.fire({
                    title: 'Active School Year!',
                    text: 'Are you sure you want to activate this school year?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Activate'
                }).then((result) => {
                    if(result.isConfirmed){
                        {{--$.ajax({--}}
                        {{--    url: `{{ url('admin/school-year/activate/${schoolYear}') }}`,--}}
                        {{--    type: 'PUT',--}}
                        {{--    headers: {--}}
                        {{--        'X-CSRF-TOKEN': '{{ csrf_token() }}',--}}
                        {{--    }--}}
                        {{--});--}}
                        window.location.href = "{{ route('admin.school-year.activate', ':id') }}".replace(':id', schoolYear);
                    }
                });
            }


            $("#table").DataTable();
        </script>
    @endpush

</x-admin-layout>
