<x-admin-layout>
    @section('title')
        Create Student <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')

            <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('teacher.add.student.store')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card">
                            <div class="card-header">Enter Student details here.</div>
                           <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="lrn_no" name="lrn_no" type="number" placeholder="LRN Number" value="{{  old('lrn_no')  }}">
                                            <x-validation-error name="lrn_no"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" autocomplete="off"  type="text" placeholder="Complete Name" value="{{ old('name') }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="password" name="password" autocomplete="off"  type="password" placeholder="Password" value="{{ old('password') }}">
                                            <x-validation-error name="password"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="email" name="email" autocomplete="off"  type="text" placeholder="Email" value="{{ old('email') }}">
                                            <x-validation-error name="email"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="year_level_id" placeholder="Year Level" :options="$year_levels" column="id" label="name">
                                            <x-validation-error name="year_level_id" ></x-validation-error>
                                        </x-select>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <div class="form-floating ">
                                            <select name="section_id" id="section_id" class=" form-select" >
                                                <option value="" selected disabled>-- Select --</option>
                                            </select>
                                            <label for="section_id">Choose Section</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="age" name="age" type="number" placeholder="Age" value="{{ old('age') }}">
                                            <x-validation-error name="age"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        @php
                                            $genders = array('Male', 'Female');
                                        @endphp


                                        <div class="form-floating ">
                                            <select name="gender" id="gender" class="form-select ">
                                                <option value="" selected disabled>-- Select --</option>
                                                @foreach ($genders as $option)
                                                    <option value="{{ $option }}"> {{ $option }}</option>
                                                @endforeach
                                            </select>
                                            <label for="gender">{{"Choose Gender"}}</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="address" name="address" type="text" placeholder="Complete Address" value="{{ old('address') }}">
                                            <x-validation-error name="address"></x-validation-error>
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
        <script>
             $(document).ready(function() {
                function addOptionsToSelect(options) {
                    var selectElement = $('#section_id');
                    selectElement.empty();
                    selectElement.append($('<option value="" selected disabled>-- Select --</option>'));
                    options.forEach(function(option) {

                        selectElement.append($('<option>', {
                            value: option.id,
                            text: option.value
                        }));
                    });
                }
                $('#year_level_id').on('change', function() {
                    var year_level_id = $(this).val();
                    var url = "{{ route('teacher.get-section.year-level', ['year_level_id' => ':year_level_id']) }}".replace(':year_level_id', year_level_id);
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function(response){
                            addOptionsToSelect(response);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-admin-layout>
