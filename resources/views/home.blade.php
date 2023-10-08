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
                    <a class="btn btn-outline-dark" href="{{route('login')}}"">Login</a>
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
        <div class="row mt-5">
            <div class="col-12 ">
                <h1 class="text-center text-white">BNATS Grading Management System</h1>
                <div class="row">
                    <div class="col-2 b-warning">
                        <img src="{{asset('img/bnats_logo.png')}}" width="200" height="200" alt="">
                    </div>
                    <div class="col-10 b-warning">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white fw-bolder">Mission</h5>
                                <p class="text-white">{{$mission}}</p>
                            </div>
                            <div class="col-12">
                                <h5 class="text-white fw-bolder">Vision</h5>
                                <p class="text-white">{{$vision_title}}</p>
                                <ul>
                                    @foreach ($vision_contents as $vc)
                                        <li class="text-white">{{$vc}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>


<X-footer></X-footer>
<x-scripts></x-scripts>
