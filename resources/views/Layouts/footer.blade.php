<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>منظومة العمليات</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  {{Html::style('css/plugins/fontawesome-free/css/all.min.css');}}
  <!-- Ionicons -->
  {{Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');}}

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
  {{Html::style('https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css');}}
  <!-- Custom style for RTL -->
  {{Html::style('css/custom.css');}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    

    @yield('content')
    <footer class="main-footer">
        <strong>جميع الحقوق &copy; 2020-2021 <a href="#">م/كمال سيد</a>.</strong>
        محفوظة.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>
    
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</div>
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- jQuery -->
{{Html::script('js/jquery.min.js');}}
    
<!-- jQuery UI 1.11.4 -->
{{Html::script('js/jquery-ui.min.js');}}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 rtl -->
{{Html::script('https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js');}}

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
{{Html::script('js/dashboard.js');}}
<!-- AdminLTE for demo purposes -->
{{Html::script('js/demo.js');}}
</body>