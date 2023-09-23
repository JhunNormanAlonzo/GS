@php
    use App\SysConf\Configuration;
    $sys = new Configuration('SYSTEM/system_config.json');
    $config = $sys->config;
    $conf_company_name = $config['system_config']['company_name'];
    $conf_logo = $config['system_config']['logo'];
    $conf_year = $config['system_config']['year'];
    $mission =  $config['system_config']['mission'];
    $vision_title =  $config['system_config']['vision']['title'];
    $vision_contents = $config['system_config']['vision']['contents'];
    $contact = $config['system_config']['contact'];
    $about = $config['system_config']['about'];
    $org_chart = $config['system_config']['org_chart'];
@endphp
<x-header></x-header>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#org_chart">Organization Chart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#contact_us">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page"  style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#about_us">About Us</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <div class="nav-link">
                    <a class="btn btn-outline-dark" href="{{url('/')}}"">Home</a>
                </div>
            </li>
        </ul>
      </div>
    </div>
</nav>
<div class="modal fade" id="contact_us">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Contact Us</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h6>Contact Number : {{$contact['number']}}</h6>
                    </div>
                    <div class="col-12 mb-3">
                        <h6>Email Address : {{$contact['email']}}</h6>
                    </div>

                    <div class="col-12 mb-3">
                        <h6>Complete Address : {{$contact['address']}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="about_us">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>About Us</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h6>{{$about}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="org_chart">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Organizational Chart</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img class="img-fluid" width="100%" src="{{asset('img/'.$org_chart)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<body style="background-image: url('{{ asset('img/bg1.png') }}'); background-size: cover; background-attachment: fixed; background-position: center; ">

<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{route('login')}}" class="logo d-flex align-items-center w-auto">
                  <img class="img-fluid" src="{{asset('img/bnats_logo.png')}}" alt="">
                  <span class="d-none d-lg-block text-white">{{config('app.name')}}</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> Grading Management System</h5>

                  </div>

                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="email">{{ __('Email Address') }}</label>
                        </div>
                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="password">{{ __('Password') }}</label>
                        </div>

                        <div class="col-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
</body>

<X-footer></X-footer>
<x-scripts></x-scripts>
