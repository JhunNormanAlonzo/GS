<x-admin-layout>
    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Section</h5>
                            <a href="{{route('admin.section.create')}}" class="btn btn-sm btn-primary mb-3">create </a>
                            <div class="row">
                                @foreach($sections->groupBy('year_level_id') as $yearLevel => $yearSections)
                                <div class="col-6">
                                   <div class="card">
                                    <div class="card-body p-3">
                                        <h2 class="text-center">{{ $yearSections->first()->yearLevel->name }}</h2>
                                        <hr>
                                        <table class="table" id="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($yearSections as $section)
                                                <tr>

                                                    <td>{{$section->name}}</td>

                                                    <td><a href="{{ route('admin.section.edit', [$section->id]) }}" class="btn btn-sm btn-outline-dark">Edit</a></td>
                                                    <td><a href="{{ route('admin.section.destroy', [$section->id]) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                   </div>
                                </div>
                                @endforeach
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
            $(".table").DataTable();
        </script>
    @endpush

</x-admin-layout>
