<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (config('app.is_demo'))
        <title itemprop="name">
            CASH-XBET
        </title>
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@CreativeTim" />
        <meta name="twitter:creator" content="@CreativeTim" />
        <meta name="twitter:title" content="Déposez et retirez de l'argent sur 1XBET en toute tranquilité" />
        <meta name="twitter:description" content="Déposez et retirez de l'argent sur 1XBET en toute tranquilité" />
        <meta name="twitter:image"
            content="" />
        <meta name="twitter:url" content="" />
        <meta name="description" content="Déposez et retirez de l'argent sur 1XBET en toute tranquilité">
        <meta name="keywords"
        content="dépot, paris sportif,1XBET, paris Bénin, FOOTBALL,foot,retraits 1XBET,Dépot 1XBET">   
        <meta property="og:app_id" content="655968634437471">
        <meta property="og:type" content="product">
        <meta property="og:title" content="Déposez et retirez de l'argent sur 1XBET en toute tranquilité">
        <meta property="og:url" content="">
        <meta property="og:image"
            content="">
        <meta property="product:price:amount" content="FREE">
        <meta property="product:price:currency" content="XOF">
        <meta property="product:availability" content="in Stock">
        <meta property="product:brand" content="Creative Tim">
        <meta property="product:category" content="FINANCIAL &amp; BET">
        <meta name="data-turbolinks-track" content="false">
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/images/icons/bet_64.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/icons/bet_64.png')}}">
    
    <title>
        CASH-XBET
    </title>
    <!--     Fonts and icons     -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
        rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/corporate-ui-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
    @laravelPWA
</head>

<body class="">

    {{ $slot }}
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}" type="text/javascript"></script>
    <script>
        if (document.getElementsByClassName('mySwiper')) {
            var swiper = new Swiper(".mySwiper", {
                autoplay: {
                    delay: 5000
                }, 
                reverseDirection : true, 
                effect: "cards",
                grabCursor: true,
                initialSlide: 1,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
               
            });
        };
    </script>
</body>

</html>
