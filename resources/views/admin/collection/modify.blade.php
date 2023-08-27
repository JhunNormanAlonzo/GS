<x-admin-layout>
    @section('content')
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">List of Modified</h5>
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requestor</th>
                                    <th>remarks</th>
                                    <th>Modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modifies as $mod)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mod->requestor->name}}</td>
                                    <td>{{$mod->remarks}}</td>
                                    <td>
                                        <span style="{{$mod->status == 'declined' ? 'pointer-events: none;' : ''}} user-select: none;" data-bs-toggle="modal" data-bs-target="#showChanges{{$mod->id}}" type="button" class=" badge {{$mod->status == 'declined' ? 'bg-danger' : 'bg-success'}}"  >{{$mod->status}}</span>

                                        <div class="modal fade" id="showChanges{{$mod->id}}">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Change Log
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                        <div class="col-lg-6 col-12 mb-3">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title text-center">Original</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table table-bordered">
                                                                        @foreach (json_decode($mod->original) as $key => $value)
                                                                        <tr>
                                                                            <td class=" ">
                                                                                <span class="float-right"> {{$key}}</span>
                                                                            </td>
                                                                            <td class="">
                                                                                {{$value}}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-12 mb-3">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-title text-center">Changes</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table table-bordered">
                                                                        @if(!empty($mod->changes))
                                                                        @foreach (json_decode($mod->changes) as $key => $value)
                                                                        <tr>
                                                                            <td class=" ">
                                                                                <span class="float-right"> {{$key}}</span>
                                                                            </td>
                                                                            <td class="">
                                                                                {{$value}}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        @endif
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    @endsection

    @section('footer')

    @endsection

    @push('scripts')
        <script>
            $("#table").DataTable();
        </script>
    @endpush
</x-admin-layout>
