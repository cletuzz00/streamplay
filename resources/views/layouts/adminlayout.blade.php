<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>HIT400 CAPSTONE DESIGN ASHY</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon.ico" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <!--datatable CSS -->
   <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="../assets/css/typography.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="../assets/css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="/admin" class="header-logo">
               <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="">
               <div class="logo-title">
                  <span class="text-primary text-uppercase"></span>
               </div>
            </a>
            <div class="iq-menu-bt-sidebar">
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li><a href="/" class="text-primary"><i class="ri-arrow-right-line"></i><span>Visit site</span></a></li>
                  <li class="active active-menu"><a href="/admin" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
                  <li><a href="{{route('admin-users')}}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>User</span></a></li>
                  <li>
                     <a href="#movie" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-film"></i><span>Movie</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="movie" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        {{-- <li><a href="add-movie.html"><i class="las la-user-plus"></i>Add Movie</a></li> --}}
                        <li><a href="#"><i class="las la-eye"></i>Movie List</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="#show" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                        class="las la-film"></i><span>Show</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i>
                     </a>
                     <ul id="show" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        {{-- <li><a href="add-show.html"><i class="las la-user-plus"></i>Add Show</a></li> --}}
                        <li><a href="#"><i class="las la-eye"></i>Show List</a></li>
                     </ul>
                  </li>
                  <li><a href="/admin/pricing" class="iq-waves-effect"><i class="ri-price-tag-line"></i><span>Pricing</span></a></li>
               </ul>
            </nav>
         </div>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar">
         <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
               <div class="iq-menu-bt d-flex align-items-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
                  <div class="iq-navbar-logo d-flex justify-content-between">
                     <a href="index.html" class="header-logo">
                        <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="">
                        <div class="logo-title">
                           <span class="text-primary text-uppercase">HIT400</span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="iq-search-bar ml-auto">
                  <form action="#" class="searchbox">
                     <input type="text" class="text search-input" placeholder="Search Here...">
                     <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                  </form>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto navbar-list">
                     <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="../assets/images/user/1.jpg" class="img-fluid rounded-circle mr-3" alt="user">
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello {{Auth::user()->name}}</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <div class="d-inline-block w-100 text-center p-3">
                                     <!-- Right Side Of Navbar -->

                                @guest
                                    @if (Route::has('login'))
                                        <a class="bg-success iq-sign-btn" href="{{ route('login') }}" role="button">{{ __('Login') }}<i class="ri-login-box-line ml-2"></i></a>
                                    @endif

                                    @if (Route::has('register'))
                                            <a class="bg-primary iq-sign-btn" href="{{ route('register') }}" role="button">{{ __('Register') }}<i class="ri-login-box-line ml-2"></i></a>
                                    @endif
                                @else

                                        <a class="bg-danger iq-sign-btn" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }} <i class="ri-login-box-line ml-2"></i></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                @endguest

                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
          @include('flash-message')
         @yield('contents')
      </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <footer class="iq-footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                  <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
               </ul>
            </div>
            <div class="col-lg-6 text-right">
               Copyright 2020 <a href="#">HIT400</a> All Rights Reserved.
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/popper.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/jquery.dataTables.min.js"></script>
   <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
   <!-- Appear JavaScript -->
   <script src="../assets/js/jquery.appear.js"></script>
   <!-- Countdown JavaScript -->
   <script src="../assets/js/countdown.min.js"></script>
   <!-- Select2 JavaScript -->
   <script src="../assets/js/select2.min.js"></script>
   <!-- Counterup JavaScript -->
   <script src="../assets/js/waypoints.min.js"></script>
   <script src="../assets/js/jquery.counterup.min.js"></script>
   <!-- Wow JavaScript -->
   <script src="../assets/js/wow.min.js"></script>
   <!-- Slick JavaScript -->
   <script src="../assets/js/slick.min.js"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="../assets/js/owl.carousel.min.js"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="../assets/js/jquery.magnific-popup.min.js"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="../assets/js/smooth-scrollbar.js"></script>
   <!-- apex Custom JavaScript -->
   <script src="../assets/js/apexcharts.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="../assets/js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="../assets/js/custom.js"></script>
</body>
</html>
