<x-admin-layout>
    @php
        $module = "Subject";
    @endphp
    @section('title')
        Create {{$module}} <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.subject.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter {{$module}} details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="year_level_id" placeholder="Year Level" :options="$year_levels" column="id" label="name">
                                            <x-validation-error name="year_level_id"></x-validation-error>
                                        </x-select>

                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="code" name="code" type="text" placeholder="Code" value="{{ old('code') }}">
                                            <x-validation-error name="code"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
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
