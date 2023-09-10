<x-admin-layout>
    @php
        $module = "Section";
    @endphp
    @section('title')
        Edit {{$module}} <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.section.update', [$section->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter {{$module}} details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="year_level_id" placeholder="Year Level" :options="$year_levels" :selected="$section->year_level_id" column="id" label="name">
                                            <x-validation-error name="year_level_id"></x-validation-error>
                                        </x-select>

                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Name" value="{{ $section->name }}">
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
