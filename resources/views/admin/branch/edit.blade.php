<x-admin-layout>
    @section('title')
        Edit Branch <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>

    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="{{route('admin.branch.update', [$branch->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter Branch details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <x-input id="name" name="name" type="text" placeholder="Name" value="{{$branch->name}}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>

                                </div>
                           </div>
                           <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    @endsection

    @section('footer')

    @endsection
</x-admin-layout>
