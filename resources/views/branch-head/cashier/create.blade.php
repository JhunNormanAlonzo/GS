<x-branch-head-layout>
    @section('title')
        Create Cashier <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('branch-head.cashier.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter Cashier details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-4 mb-3">
                                        <x-input id="firstname" name="firstname" type="text" placeholder="First Name" value="{{ old('firstname') }}">
                                            <x-validation-error name="firstname"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <x-input id="middlename" name="middlename" type="text" placeholder="Middle Name" value="{{ old('middlename') }}">
                                            <x-validation-error name="middlename"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-4 mb-3">
                                        <x-input id="lastname" name="lastname" type="text" placeholder="Last Name" value="{{ old('lastname') }}">
                                            <x-validation-error name="lastname"></x-validation-error>
                                        </x-input>
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
</x-branch-head-layout>
