<x-admin-layout>
    @section('title')
        Edit Student <a href="{{ url()->previous() }}" class="btn-link btn-sm btn" >Go Back</a>
    @endsection

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('teacher.add.student.update', [$user->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card">
                            <div class="card-header">Enter Student details here.</div>
                        <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="lrn_no" readonly name="lrn_no" type="number" placeholder="LRN Number" value="{{  $user->student->lrn_no  }}">
                                            <x-validation-error name="lrn_no"></x-validation-error>
                                        </x-input>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="name" name="name" type="text" placeholder="Complete Name" value="{{ $user->name }}">
                                            <x-validation-error name="name"></x-validation-error>
                                        </x-input>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="email" name="email" type="text" placeholder="Email" value="{{ $user->email }}">
                                            <x-validation-error name="email"></x-validation-error>
                                        </x-input>
                                    </div>
                                    {{-- <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="section_id" placeholder="Section" :options="$sections" :selected="$user->student->section_id"  column="id" label="name">
                                            <x-validation-error name="section_id" ></x-validation-error>
                                        </x-select>
                                    </div> --}}

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-select name="year_level_id" placeholder="Year Level" :options="$year_levels" :selected="$user->student->year_level_id"  column="id" label="name">
                                            <x-validation-error name="year_level_id" ></x-validation-error>
                                        </x-select>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <div class="form-floating ">
                                            <select name="section_id" id="section_id" :selected="$user->student->section_id" class=" form-select" >
                                                <option value="" selected disabled>-- Select --</option>
                                            </select>
                                            <label for="section_id">Choose Section</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="age" name="age" type="number" placeholder="Age" value="{{ $user->age }}">
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
                                                    <option @if($user->gender == $option) selected @endif value="{{ $option }}"> {{ $option }}</option>
                                                @endforeach
                                            </select>
                                            <label for="gender">{{"Choose Gender"}}</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <x-input id="address" name="address" type="text" placeholder="Complete Address" value="{{ $user->student->address }}">
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
    <script>
        $(document).ready(function() {
            var default_year_level_id =  $('#year_level_id').val();
            var default_section_id = {{$user->student->section_id}}
            var url = "{{ route('teacher.get-section.year-level', ['year_level_id' => ':year_level_id']) }}".replace(':year_level_id', default_year_level_id);
               $.ajax({
                   url: url,
                   type: "GET",
                   success: function(response){
                       addOptionsToSelect(response);
                   }
               });
           function addOptionsToSelect(options) {
               var selectElement = $('#section_id');

               selectElement.empty();
               selectElement.append($('<option value="" selected disabled>-- Select --</option>'));
               options.forEach(function(option) {
                    var $option = $('<option>', {
                        value: option.id,
                        text: option.value
                    });

                    if (option.id === default_section_id) {
                        $option.prop('selected', true);
                    }
                    selectElement.append($option);
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
