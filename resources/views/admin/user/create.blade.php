<x-admin-layout>
    @section('title')
        Create Admin <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.user.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter Admin details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Complete Name" value="{{ old('name') }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="email" name="email" type="text" placeholder="Email" value="{{ old('email') }}">
                                            <x-validation-error name="email"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="username" name="username" type="text" placeholder="Username" value="{{ old('username') }}">
                                            <x-validation-error name="username"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="password" name="password" type="password" placeholder="Password" value="{{ old('password') }}">
                                            <x-validation-error name="password"></x-validation-error>
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
