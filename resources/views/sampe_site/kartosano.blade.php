<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Open+Sans:300,400,500,600,700"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/swiper.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css"/>

    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css"/>

    <link rel="stylesheet" href="assets/css/custom.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Sample Site</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="transparent-header floating-header" data-sticky-class="not-dark">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="/" class="standard-logo" data-dark-logo="images/logo.png"><img
                                src="assets/images/logo.png" alt="Sample Site"></a>
                    <a href="/" class="retina-logo" data-dark-logo="images/logo.png"><img
                                src="assets/images/logo.png" alt="Sample Site"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="dark">

                    <ul>
                        @include('sample_site._partials.menu')
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->

    @yield('slider')
    <!-- Content
============================================= -->
    <section id="content">

        <div class="content-wrap @yield('wrap-padding')">

            @yield('content')

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">
                <div class="col-md-3">
                    MAPA DO SITE
                    <ul>
                        @include('sample_site._partials.menu')
                    </ul>
                </div>
                <div class="col-md-3">
                    CONDIÇÕES GERAIS
                    <ul>
                        <li><a href="condicoesgerais/usuario">Usuário</a></li>
                        <li><a href="condicoesgerais/credenciado">Credenciado</a></li>
                        <li><a href="condicoesgerais/corretora">Corretora</a></li>
                    </ul>
                    MATERIAIS
                    <ul>
                        <li><a href="manualdocredenciado">Manual do Credenciado</a></li>
                        <li><a href="guiadocorretor">Guia do Corretor</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    SIGA-NOS
                    <br><br>
                    <a href="http://www.twitter.com" target="_blank"><img src="assets/images/twitter.png" alt="Twitter"></a>&nbsp;&nbsp;
                    <a href="http://www.facebook.com" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a>
                </div>
                <div class="col-md-3">
                    <address>{{ $site->address_1 }}
                    </address>
                    {{ $site->phone_1 }}
                    <br><br>
                    <a href="/"><img src="assets/images/logo-footer.png" alt="Sample Site"></a>
                </div>
            </div><!-- .footer-widgets-wrap end -->

        </div>


    </footer>
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="assets/js/functions.js"></script>

</body>
</html>