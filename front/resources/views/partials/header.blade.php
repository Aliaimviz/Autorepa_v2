<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Auto Repa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  </head>
  <body class="panel-g">
  <header id="header">
    <div id="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3 float-left">
          <div class="logo">
       <a href="http://site.startupbug.net:6999/auto/"><img src="{{ asset('asset/img/auto-repa-logo.png') }}" alt="logo"></a></div>
        </div>
        <div class="main_menu col-xs-12 col-sm-12 col-md-6 col-lg-6 float-left">
          <ul class="main-nav">
            <li><a href="http://site.startupbug.net:6999/auto/">Home</a></li>
            <li><a href="http://site.startupbug.net:6999/auto/about-us.html">About us</a></li>
            <li><a href="http://site.startupbug.net:6999/auto/concept.html">Concept</a></li>
            <li><a href="#" data-toggle="modal" data-target="#login-first">Profile</a></li>

          </ul>
        </div>
        <div class="main_menu col-xs-12 col-sm-12 col-md-3 col-lg-3 float-left">
         <!--  <div class="lang">
            <ul>
              <li><a href="#">FR</a></li>
              <li><a href="#">DE</a></li>
              <li><a href="http://site.startupbug.net:6999/auto/">EN</a></li>
            </ul>
          </div> -->
          <div class="login">
          <!--  <a href="#"><i class="fa fa-lock"></i>  Login  <i class="fa fa-caret-down"></i></a> -->
            <div class="dropdown-main">
                <button class="btn btn-primary dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown"><span class="fa fa-lock"  ></span> Login
               </button>
                <ul class="dropdownmenu">
                  <li><a href="#" data-toggle="modal" data-target="#login">Singup</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#login-model">Login</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#logout-model">Logout</a></li>
                </ul>
            </div>
          </div>
        </div>
    </div>
    </div>
  </header>
