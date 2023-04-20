<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carton Le Bui Shop</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="">
    <meta property="og:image" content="">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/lightslider.css">

    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="https://unpkg.com/balloon-css/balloon.min.css">
    <link rel="stylesheet" href="css/landingpage/style.css">
    <link rel="stylesheet" href="css/landingpage/header.css">
    <link rel="stylesheet" href="/css/landingpage/blog.css" type="text/css">
    <link rel="stylesheet" href="css/landingpage/downtime.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126581925-4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css?v2022">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css?v2022">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>

    <!-- preloader-end -->

    <!-- header-area -->
    @include('landingpage.layout.header')
    <!-- header-area-end -->

    <!-- Page Content -->
    @yield('content')
    <!-- End Page Content -->
    <!-- main-area-end -->

    <!-- footer-area -->
    @include('landingpage.layout.footer')
    <!-- footer-area-end -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"></script>
    <script src="slick/slick.js?v2022" type="text/javascript" charset="utf-8"></script>
    <script src="js/lightslider.js"></script>
    <script src="js/script.js"></script>
    {{-- down  time --}}
    <script type="text/javascript" src="js/jquery.syotimer.js"></script>
    <script type="text/javascript" src="js/service.js"></script>
    {{-- <script type="text/javascript" src="js/downtime.js"></script> --}}
    <script type="text/javascript">
    
      $(document).on('ready', function() {

        slider_res()
      });
      $(window).resize(function() {
        slider_res()
      });
      function slider_res(){
        var width = $(window).width();
        if (width >= 1280){
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4
          });
        }
        if (width < 1280 && width >= 1024){
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
          });
        }
        if (width < 1024 ){
          $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2
          });
        }

      }

  </script>
</body>

</html>
