<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <x-layout.head :title="$title ?? ''"></x-layout.head>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top mb-5" data-scrollto-offset="0">
    <x-layout.header></x-layout.header>
  </header><!-- End Header -->

  

  <main id="main" class='mt-5'>
    <div class="container-fluid mt-5">
      {{$slot}}
    </div>
  </main>

  <!-- ======= Footer ======= -->
  <x-layout.footer></x-layout.footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <x-layout.script></x-layout.script>

</body>

</html>