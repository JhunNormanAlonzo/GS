<x-admin-layout>
    @section('title')
        Create Teacher <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.teacher.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter Teacher details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="emp_no" readonly name="emp_no" type="text" placeholder="Employee Number" value="{{ $emp_no }}">
                                            <x-validation-error name="emp_no"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Complete Name" value="{{ old('name') }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="username" name="username" autocomplete="off" type="text" placeholder="Username" value="{{ old('username') }}">
                                        <x-input id="email" name="email" type="text" autocomplete="off"  placeholder="Email" value="{{ old('email') }}">
                                            <x-validation-error name="email"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="username" name="username" autocomplete="off" type="text" placeholder="Username" value="{{ old('username') }}">
                                            <x-validation-error name="username"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="password" name="password" type="password" placeholder="Password" value="{{ old('password') }}">
                                            <x-validation-error name="password"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="section_id" placeholder="Section" :options="$sections" column="id" label="name">
                                            <x-validation-error name="section_id" ></x-validation-error>
                                        </x-select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-input id="address" name="address" type="text" placeholder="Complete Address" value="{{ old('address') }}">
                                            <x-validation-error name="address"></x-validation-error>
                                        </x-input>
                                    </div>
                                </div>
                           </div>
                           <div class="card-footer">

                            <button type="submit" class="btn btn-primary">Save</button>
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
