<x-admin-layout>
    @php
        $module = "Year Level";
    @endphp
    @section('title')
        Update {{$module}} <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.year-level.update', [$year_level->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter {{$module}} details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Name" value="{{ $year_level->name }}">
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

    @push('scripts')

    @endpush
</x-admin-layout>
