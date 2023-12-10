<x-admin-layout>
    @section('title')
        Teacher Dashboard
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row">
            @forelse($teacher_subjects as $teacher_subject)
            <a href="{{route('teacher.teacher-student.subject', [$teacher_subject->subject_id])}}" data-bs-toggle="tooltip" data-bs-title="Go to {{$teacher_subject->subject->yearLevel->name." ".$teacher_subject->subject->name}} class." class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">{{$teacher_subject->subject->yearLevel->name}}<span></span></h5>
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$teacher_subject->subject->name}}</h6>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="row">
                <div class="col-12 py-5 text-center">
                    <i class="bi bi-search  " style="font-size: 70px"></i>
                    <h4 class="">No Assigned Class</h4>
                </div>
            </div>

            @endforelse



        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
</x-admin-layout>
