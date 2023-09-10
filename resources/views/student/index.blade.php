<x-student-layout>
    @section('title')
        Dashboard
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row">
            @foreach($subjects as $subject)
            <a href="{{route('student.view-grade.year.section.subject', [
                'year_level_id' => $subject->year_level_id,
                'section_id' => $student->section_id,
                'subject_id' => $subject->id,
                'student_id' => $student->id
            ])}}" data-bs-toggle="tooltip" data-bs-title="View grade on  {{$subject->code." ".$subject->name}}." class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">{{$subject->name}}<span></span></h5>
                        <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$subject->code}}</h6>
                        </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
</x-student-layout>
