<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery-migrate-1.1.1.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('fronted/js/script.js') }}"></script>
    <script src="{{ asset('fronted/js/superfish.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery.equalheights.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery.mobilemenu.js') }}"></script>
    <script src="{{ asset('fronted/js/tmStickUp.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery.ui.totop.js') }}"></script>
    <script src="{{ asset('fronted/js/jquery.shuffle-images.js') }}"></script>
    <script src="{{ asset('frontend/js/touchTouch.jquery.js') }}"></script>
    <script>
        $(window).load(function() {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
            $('#stuck_container').tmStickUp({});
            $('.gallery .gall_item').touchTouch();
        });

        $(document).ready(function() {
            $(".shuffle-me").shuffleImages({
                target: ".images > img"
            });
        });
    </script>
</head>

<body class="page1" id="top">
    <!--==============================
              header
=================================-->
    <header>
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <h1><a href="#">Photo.Folio <br> Capturando Momentos </a></h1>
                        tu fotografo
                    </div>
                </div>
            </div>
        </div>
        <section id="stuck_container">
            <!--==============================
              Stuck menu
  =================================-->
            <div class="container">
                <div class="row">
                    <div class="grid_12 ">
                        <h1 class="logo">
                            <a href="index.html">
                                Photo.Folio
                            </a>
                        </h1>
                        <div class="navigation ">
                            <nav>
                                <ul class="sf-menu">
                                    <li><a href="{{ route('register') }}">Comenzar</a></li>
                                </ul>
                            </nav>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </section>
    </header>
</body>
</html>
