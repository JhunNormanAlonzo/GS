<x-admin-layout>
    @section('title')
        System Configuration Branch <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-6">
                    <form enctype="multipart/form-data" action="{{route('admin.config.update_config')}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter System details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-12 mb-3">
                                        <x-input id="company_name" name="company_name" type="text" placeholder="Company Name" value="{{ $config['system_config']['company_name'] }}">
                                            <x-validation-error name="company_name"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-input id="logo" name="logo" type="text" placeholder="Logo" value="{{ $config['system_config']['logo'] }}">
                                            <x-validation-error name="logo"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <x-input id="year" name="year" type="number" placeholder="Year" value="{{ $config['system_config']['year'] }}">
                                            <x-validation-error name="year"></x-validation-error>
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

    @section('footer')

    @endsection
</x-admin-layout>
