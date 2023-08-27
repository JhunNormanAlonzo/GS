<x-branch-head-layout>
    @section('title')
        Dashboard
    @endsection

    @section('content')
    <div class="col-lg-12">
        <div class="row">


          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">



              <div class="card-body">
                <h5 class="card-title">Cashier <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$cashier->count()}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Collections <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bank"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{number_format($total_collections->sum('net'), '2')}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->





        </div>
      </div>
    @endsection

    @section('footer')

    @endsection
</x-branch-head-layout>
