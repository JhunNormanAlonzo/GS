<x-admin-layout>
    @section('title')
        Request by {{$modify_request->requestor->name}}<a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-6">


                        <div class="card">
                            <div class="card-header">Message of requestor</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                       <textarea class="form-control text-info" readonly name="" id="" cols="30" rows="10">{{$modify_request->remarks}}</textarea>
                                    </div>
                                </div>
                           </div>
                           <div class="card-footer d-flex justify-content-between">
                            <form action="{{route('admin.notification.act_request.approve', [$modify_request->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <button type="submit" class="btn btn-primary">Approve</button>
                            </form>

                            <form action="{{route('admin.notification.act_request.decline', [$modify_request->id])}}" method="POST">
                                @csrf
                                @method("PUT")
                                <button type="submit" class="btn btn-danger">Decline</button>
                            </form>


                           </div>
                        </div>

                </div>
            </div>

        </div>

    @endsection

    @section('footer')

    @endsection
</x-admin-layout>

