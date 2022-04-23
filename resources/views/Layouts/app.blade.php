<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('منظومة النظم', 'منظومة النظم') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
  {{Html::style('css/plugins/fontawesome-free/css/all.min.css');}}
  <!-- Ionicons -->
  {{Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');}}
  {{--  --}}
  {{Html::style('css/plugins/datatables-bs4/css/dataTables.bootstrap4.css');}}
  {{--  --}}
  
  <!-- Tempusdominus Bbootstrap 4 -->
  {{Html::style('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');}}
  <!-- iCheck -->
  {{Html::style('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css');}}
  <!-- JQVMap -->
  {{Html::style('css/plugins/jqvmap/jqvmap.min.css');}}
  <!-- Theme style -->
  {{Html::style('css/adminlte.min.css');}}
  <!-- overlayScrollbars -->
  {{Html::style('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');}}
  <!-- Daterange picker -->
  {{Html::style('css/plugins/daterangepicker/daterangepicker.css');}}
  <!-- summernote -->
  {{Html::style('css/plugins/summernote/summernote-bs4.css');}}
  <!-- Google Font: Source Sans Pro -->
  {{Html::style('css/plugins/summernote/summernote-bs4.css');}}
  {{Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');}}

  <!-- Bootstrap 4 RTL -->
  {{Html::style('css/bootstrap.min.css');}}
  <!-- Custom style for RTL -->
  {{Html::style('css/custom.css');}}
    <!-- Styles -->
    
</head>

<body class="hold-transition sidebar-mini layout-fixed" dir="rtl">
 <div class="wrapper">
        <div id="app">
          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ms-auto">
                
                <!-- Authentication Links -->
                @guest
                
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل دخول') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل حساب') }}</a>
                        </li>
                    @endif
                @else
                
                <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                    <li class="nav-item dropdown navbar-light">
                      
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            {{-- <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">الرئيسية</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">تسجيل الخروج</a>
              </li>
            </ul>
        
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form> 
            
            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto-navbav">
              
                 
                
            </ul>
            
            --}}
            
            
            
          </nav>
        </div>
        

          <!-- /.navbar -->
        @if (Auth::user())
            
         
          <!-- Main Sidebar Container -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
              <img src="{{url('/images/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                   style="opacity: .8">
              <span class="brand-text font-weight-light text-lg-right ">منظومة قسم النظم</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex " dir="rtl">
                <div class="image">
                  <img src="{{url('/images/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="{{ url('/') }}" class="d-block">{{ Auth::user()->username }}</a>
                </div>
              </div>        
              <!-- Sidebar Menu -->
              <nav class="mt-3 ">
                <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->

                 @if (Auth::user()->admin)
                         
                      

                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        لوحة التحكم
                        <i class="left fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>التقريشة</p>
                            <i class="fas fa-angle-left left"></i>
                        </a>
                           <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="{{ url('/taqreshamain') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>
                                        نظرة عامة
                                </p>
                                   </a>
                                   
                               </li>
                               <li class="nav-item">
                                   <a href="#" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>
                                      سُلف
                                </p>
                                   </a>
                                   
                               </li>
                               <li class="nav-item">
                                   <a href="#" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>
                                       واردات
                                       </p>
                                   </a>
                                   
                               </li>
                               <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    صادرات
                                    </p>
                                </a>
                                
                            </li>
                               
                          </ul>
                      </li>
                    </ul>
                  </li>
                  
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        أجهزة النظم
                        <i class="left fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ url('/showpc') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>حواسب</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/showext')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>لوازم</p>
                        </a>
                      </li>
                        <li class="nav-item has-treeview">
                          
                          <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                          <p>طابعات</p>
                              <i class="fas fa-angle-left left"></i>
                          </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                        <a href="{{url('/showcolored')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>ألوان</p>
                        </a>
                      </li>
                            <li class="nav-item">
                        <a href="{{url('/showprinter')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>أبيض و أسود</p>
                        </a>
                      </li>
                          </ul>
                        
                          
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tree"></i>
                      <p>
                          صلاحيات 
                          <i class="fas fa-angle-left left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="pages/UI/general.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>قائد الفرع</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/UI/icons.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>رئيس قسم</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="pages/UI/buttons.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>مجندين الفرع</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                @endif
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      مجندين
                      <i class="fas fa-angle-left left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>أقدمية</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/layout/boxed.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>متواجدين</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>أجازات</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/layout/fixed-topnav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>مواعيد تسليم</p>
                      </a>
                    </li>
                  </ul>
                </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
         
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">منظومة قسم النظم</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                      <li class="breadcrumb-item active">منظومةقسم النظم</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>

            
            <div class="content-header">
              <div class="container-fluid">
            @yield('content')

        
              </div>
            </div>
          </div>  
        @endif
            {{-- if not logged in --}}
      <!-- Control Sidebar -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
  <footer class="main-footer">
    <strong>جميع الحقوق &copy; 2021-2022 <a href="#">م/كمال سيد</a>.</strong>
    محفوظة.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>



  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->
{{Html::script('js/jquery.min.js');}}

<!-- jQuery UI 1.11.4 -->
{{Html::script('js/jquery-ui.min.js');}}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 rtl -->
{{Html::script('js/bootstrap.min.js');}}

<!-- Bootstrap 4 -->
{{Html::script('js/bootstrap.bundle.min.js');}}

<!-- ChartJS -->
{{Html::script('js/Chart.min.js');}}


<!-- Sparkline -->
{{Html::script('js/sparkline.js');}}

<!-- JQVMap -->
{{Html::script('js/jquery.vmap.min.js');}}
{{Html::script('js/jquery.vmap.world.js');}}

<!-- jQuery Knob Chart -->
{{Html::script('js/jquery.knob.min.js');}}

<!-- daterangepicker -->
{{Html::script('js/moment.min.js');}}
{{Html::script('js/daterangepicker.js');}}
<!-- Tempusdominus Bootstrap 4 -->
{{Html::script('js/tempusdominus-bootstrap-4.min.js');}}
<!-- Summernote -->
{{Html::script('js/summernote-bs4.min.js');}}
<!-- overlayScrollbars -->
{{Html::script('js/jquery.overlayScrollbars.min.js');}}
<!-- AdminLTE App -->
{{Html::script('js/adminlte.js');}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
{{Html::script('js/demo.js');}}
{{--  --}}
{{Html::script('js/jquery.dataTables.js');}}
{{--  --}}
{{Html::script('js/dataTables.bootstrap4.js');}}

@yield('footer')

</body>
</html>
