<x-admin-layout>
    @php
        $module = "School Year";
    @endphp
    @section('title')
        Create {{$module}} <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.school-year.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter {{$module}} details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        @php
                                            $year_today = now()->format('Y');
                                        @endphp
                                        <x-input id="name" name="name" type="text" placeholder="({{$year_today}}-{{$year_today+1}})" value="{{ old('name') }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>
                                </div>
                           </div>
                           <div class="card-footer">

                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-danger">Clear</button>
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
