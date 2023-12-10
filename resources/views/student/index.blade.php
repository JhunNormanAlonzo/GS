<x-student-layout>
    @section('title')
        Dashboard
        <a class="btn btn-outline-primary btn-sm float-end" href="{{request()->has('active_school_year') ? route('student.dashboard.index') : url('/student/dashboard?active_school_year')}}">
            {{request()->has('active_school_year') ? "All School Year" : "Only Active School Year"}}
        </a>
    @endsection

    @section('content')
    <div class="col-lg-12">


        <div class="row">
            @foreach($teacher_students as $teacher_student)


                <a href="{{route('student.view-grade', [$teacher_student])}}" style="cursor: pointer;" data-bs-placement="bottom" data-bs-toggle="tooltip" data-bs-title="View grade on  {{$teacher_student->subject->code." ".$teacher_student->subject->name}}." class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">{{$teacher_student->subject->name}}<span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{$teacher_student->subject->code}}</h6>
                                <sup class="text-danger fw-bold ">SY : {{$teacher_student->schoolYear->name}}</sup>
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
