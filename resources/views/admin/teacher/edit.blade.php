<x-admin-layout>
    @section('title')
        Edit Teacher <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.teacher.update', [$teacher->user_id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter Teacher details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Complete Name" value="{{ $teacher->user->name }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="email" name="email" type="text" placeholder="Email" value="{{ $teacher->user->email }}">
                                            <x-validation-error name="email"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="section_id" placeholder="Section" :options="$sections" :selected="$teacher->section_id" column="id" label="name">
                                            <x-validation-error name="section_id" ></x-validation-error>
                                        </x-select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-input id="address" name="address" type="text" placeholder="Complete Address" value="{{ $teacher->address }}">
                                            <x-validation-error name="address"></x-validation-error>
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
