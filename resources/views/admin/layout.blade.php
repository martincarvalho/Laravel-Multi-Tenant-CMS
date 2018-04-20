<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/png">
    <title>Martin Multi-tenent Laravel CMS</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/theme.css" rel="stylesheet">
    <link href="/assets/css/ui.css" rel="stylesheet">
    <link href="/assets/css/layout.css" rel="stylesheet">
    <script src="/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link href="/assets/css/custom.css" rel="stylesheet">
    <link href="/assets/plugins/summernote/summernote.min.css" rel="stylesheet">

</head>
<!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
<!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
<!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
<!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
<!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
<!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
<!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
<!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
<!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

<!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
<!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->

<!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
<!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
<!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
<!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
<!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
<!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
<!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
<!-- BEGIN BODY -->
<body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<section>
    <!-- BEGIN SIDEBAR -->
    @include('admin._partials.menu')
    <!-- END SIDEBAR -->
    <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
            <div class="header-left">
                <div class="topnav">
                    <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                </div>
            </div>
            <div class="header-right">
                <ul class="header-menu nav navbar-nav">
                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username">Olá {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ url('/logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit"><i class="icon-logout"></i><span>Logout</span></button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                </ul>
            </div>
            <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
            @yield('content')
            <div class="footer">
                <div class="copyright">
                    <p class="pull-left sm-pull-reset">
                        <span>Copyright <span class="copyright">©</span> 2016 </span>
                        <span>Martin Multi-tenent Laravel CMS</span>.
                        <span>Todos os direitos reservados. </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END MAIN CONTENT -->
</section>
<!-- BEGIN PRELOADER -->
<div class="loader-overlay">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- END PRELOADER -->
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<script src="/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<script src="/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<script src="/assets/plugins/gsap/main-gsap.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
<script src="/assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
<script src="/assets/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
<script src="/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
<script src="/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
<script src="/assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
<script src="/assets/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
<script src="/assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
<script src="/assets/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
<script src="/assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
<script src="/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
<script src="/assets/plugins/charts-chartjs/Chart.min.js"></script>
<script src="/assets/js/builder.js"></script> <!-- Theme Builder -->
<script src="/assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
<script src="/assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
<script src="/assets/js/quickview.js"></script> <!-- Chat Script -->
<script src="/assets/js/pages/search.js"></script> <!-- Search Script -->
<script src="/assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
<script src="/assets/js/application.js"></script> <!-- Main Application Script -->
<script src="/assets/js/layout.js"></script>
<script src="/assets/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="/assets/plugins/summernote/summernote.min.js"></script>
</body>
</html>