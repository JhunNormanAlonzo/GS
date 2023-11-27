<x-admin-layout>
    @section('title')
        Dashboard
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                    <h5 class="card-title">Teacher <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$teachers->count()}}</h6>

                        </div>
                    </div>
                    </div>

                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                <h5 class="card-title">Student<span></span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$students->count()}}</h6>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Section<span></span></h5>
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$sections->count()}}</h6>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Year Level<span></span></h5>
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-gear"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$yearlevels->count()}}</h6>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Subject<span></span></h5>
                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$subjects->count()}}</h6>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Current School Year<span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{$current_school_year}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
</x-admin-layout>
