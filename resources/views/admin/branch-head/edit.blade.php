<x-admin-layout>
    @section('title')
        Edit Branch Head <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>

    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="{{route('admin.branch-head.update', [$branch_head->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter Branch Head details here.</div>
                           <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12 mb-2">
                                    <x-input id="name" name="name" type="text" placeholder="Name" value="{{$branch_head->name}}">
                                        <x-validation-error name="name"></x-validation-error>
                                    </x-input>
                                </div>

                                <div class="col-12 mb-2">
                                    <x-input id="name" name="email" type="email" placeholder="Email" value="{{$branch_head->email}}">
                                        <x-validation-error name="email"></x-validation-error>
                                    </x-input>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                        <select name="branch_id" class="form-select" id="">
                                            <option value="" selected disabled>-- Branch --</option>
                                           @foreach ($branches as $branch)
                                                <option @if($branch->id == $branch_head->branch_id) selected @endif value="{{$branch->id}}">{{$branch->name}}</option>
                                           @endforeach
                                        </select>
                                        <label for="">Choose Branch</label>
                                        <x-validation-error name="branch_id"></x-validation-error>
                                    </div>
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
