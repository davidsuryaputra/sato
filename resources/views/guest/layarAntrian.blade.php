<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Antrian {{ $showroomName }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('dist/css/skins/skin-blue.min.css') }}">
  {{--
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('bootstrap/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('bootstrap/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ url('bootstrap/css/jquery-ui.css') }}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ url('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ url('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  --}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Left side column. contains the logo and sidebar -->
  {{--
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@yield('name')</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @yield('sidebar-menu')
    </section>
    <!-- /.sidebar -->
  </aside>
  --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    {{--
    <section class="content-header">
      <h1>
        Beranda
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>
    --}}

    <!-- Main content -->
    <!-- <section class="content"> -->
      <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Antrian {{ $showroomName }}</h3>

                  <div class="box-tools">
                    {{--
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    --}}
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>No Kendaraan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody class="queue">
                      @foreach($queues as $queue)
                      <tr id="{{ $queue->id }}">
                        <td>#{{ $queue->id }}</td>
                        <td>{{ $queue->item->name }}</td>
                        <td>{{ $queue->no_kendaraan }}</td>
                        <td id="{{ $queue->id }}">{{ $queue->status }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
                <!-- /.box-body -->
                {{--
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
                --}}
              </div>
              <!-- /.box -->
            </div>
          </div>
    <!-- </section> -->
    <!-- /.content -->
  </div>

  <script src="//js.pusher.com/3.0/pusher.min.js"></script>
  <script>
  var pusher = new Pusher("{{ env('PUSHER_KEY') }}");
  var channel = pusher.subscribe('antrian');
  channel.bind('newAntrian', function (data){
    if(data.showroom_id == {{ $queue->showroom_id or '0' }}){
      var tr = "<tr id="+data.id+"><td>#"+data.id+"</td><td>"+data.jenis+"</td><td>"+data.no_kendaraan+"</td><td id='"+data.id+"'>"+data.status+"</td></tr>";
      $('.queue').hide();
      $('.queue').fadeIn('slow');
      $('.queue').append(tr);
    }

    // alert(data.message);
  });
  channel.bind('updateAntrian', function (data){
    if(data.showroom_id == {{ $queue->showroom_id or '0' }}){

      if(data.status == "Selesai"){
        $('.queue').hide();
        $('.queue').fadeIn('slow');
        $("td[id="+data.id+"]").html(data.status);
        setTimeout(function (){
          $("tr[id="+data.id+"]").remove();
        }, 5000);
      }

      $('.queue').hide();
      $('.queue').fadeIn('slow');
      $("td[id="+data.id+"]").html(data.status);
    }
  });
  </script>

  <!-- /.content-wrapper -->
  {{--
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  --}}


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{{ url('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('plugins/jQueryUI/jquery-ui.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
{{--
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ url('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
<script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js') }}"></script>
--}}
</body>
</html>
