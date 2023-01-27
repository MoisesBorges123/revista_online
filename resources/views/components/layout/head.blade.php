  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ !empty($title) ? $title. " | Revista" : config('app.name', 'Revista') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href={{asset("assets/img/favicon.png")}} rel="icon">
  <link href={{asset("assets/img/apple-touch-icon.png")}} rel="apple-touch-icon">
  <link rel="stylesheet" href={{asset("assets/css/animate.css")}}>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href={{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
  <link href={{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}} rel="stylesheet">
  <link href={{asset("assets/vendor/aos/aos.css")}} rel="stylesheet">
  <link href={{asset("assets/vendor/glightbox/css/glightbox.min.css")}} rel="stylesheet">
  <link href={{asset("assets/vendor/swiper/swiper-bundle.min.css")}} rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href={{asset("assets/css/variables.css")}} rel="stylesheet">
  <!--<link href="assets/css/variables.css" rel="stylesheet">-->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!--<link href="assets/css/variables-purple.css" rel="stylesheet"> -->
 <!--<link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href={{asset("assets/css/main.css")}} rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.4.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  ======================================================== -->
  @livewireStyles
  <script src={{mix("js/app.js")}}></script>
  <link href="{{mix('css/blog/styles.css')}}" rel="stylesheet">
  <link  rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>