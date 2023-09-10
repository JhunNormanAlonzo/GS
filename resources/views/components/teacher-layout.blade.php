<!DOCTYPE html>
<html lang="en">
@php
    use App\SysConf\Configuration;
    $sys = new Configuration('SYSTEM/system_config.json');
    $config = $sys->config;
    $conf_company_name = $config['system_config']['company_name'];
    $conf_logo = $config['system_config']['logo'];
    $conf_year = $config['system_config']['year'];
@endphp
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>{{ $conf_company_name }} </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <x-header></x-header>

</head>

<body>

<x-navbar></x-navbar>

<x-sidebar></x-sidebar>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-12">
            @yield('content')
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <x-footer></x-footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <x-scripts></x-scripts>
  @include('sweetalert::alert')
  @stack('scripts')
</body>

</html>
