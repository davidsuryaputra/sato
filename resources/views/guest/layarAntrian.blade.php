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
  <!-- <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}"> -->

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

              <div class="alert alert-success" id="success">
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Daftar Antrian {{ $showroomName }}</div>
                  <div class="panel-body">
                    <table id="layarAntrian" class="table table-hover table-striped">
                      <thead>
                        <tr style="background-color:#87CEFA; color:black;">
                          <th>No</th>
                          <th>Jenis</th>
                          <th>No Kendaraan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="queue">
                        @foreach($queues as $queue)
                        <tr id="{{ $queue->id }}">
                          <td>{{ $queue->id }}</td>
                          <td>{{ $queue->item->name }}</td>
                          <td>{{ $queue->no_kendaraan }}</td>
                          <td id="{{ $queue->id }}">{{ $queue->status }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
    <!-- </section> -->
    <!-- /.content -->
  </div>


  <!-- jQuery 2.2.0 -->
  <script src="{{ url('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ url('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
  <script src="//js.pusher.com/3.0/pusher.min.js"></script>
  <script>
  var pusher = new Pusher("{{ env('PUSHER_KEY') }}");
  var channel = pusher.subscribe('antrian');
  channel.bind('newAntrian', function (data){

    if(data.showroom_id == {{ $queue->showroom_id or '0' }}){
      var dataId = data.id;
      var no_kendaraan = data.no_kendaraan;
      //var tr = "<tr id="+data.id+"><td>#"+data.id+"</td><td>"+data.jenis+"</td><td>"+data.no_kendaraan+"</td><td id='"+data.id+"'>"+data.status+"</td></tr>";
      $('.queue').hide();
      $('.queue').fadeIn('slow');
      //$('.queue').append(tr);
      var table = $("#layarAntrian").DataTable();

      table.row.add([
        data.id,
        data.jenis,
        data.no_kendaraan,
        data.status
      ]).draw();
      /*
      var rowIndex = table.fnAddData(['id', 'jenis', 'no plat', 'status']);
      var row = table.fnGetNodes(rowIndex);
      $(row).attr('id', 'uniq id');
      */

    }

    $('#success').fadeIn('slow', function(){
      $('#success').html(data.no_kendaraan + ' Berhasil ditambahkan.');
    }).delay(5000).fadeOut();

  });
  channel.bind('updateAntrian', function (data){
    if(data.showroom_id == {{ $queue->showroom_id or '0' }}){

      var no_kendaraan = data.no_kendaraan;
      var table = $('#layarAntrian').DataTable();

        if(data.status == "Selesai"){
          $('#success').html('Antrian ' + data.id + ' Selesai.');
          $('#success').fadeIn('slow').delay(10000).fadeOut();
          table.rows('#' + data.id).remove().draw();
          /*
          table.rows().every(function (rowIdx, tableLoop, rowLoop){
            var currentRow = this.data();
            if(currentRow[0] == data.id){
              currentRow[3] = data.status;
              this.data(currentRow);
              $('#success').html('Antrian ' + data.id + ' Selesai.');
              $('#success').fadeIn('slow').delay(5000).fadeOut();
              table.row(this).remove().draw();
              return false;
            }


          });
          */

          /*
          $('.queue').hide();
          $('.queue').fadeIn('slow');
          $("td[id="+data.id+"]").html(data.status);
          setTimeout(function (){
            $("tr[id="+data.id+"]").remove();
          }, 5000);
          */
        }


        table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {

          var currentRow = this.data();
          if(currentRow[0] == data.id){
            currentRow[3] = data.status;
            this.data(currentRow);
            $('#success').html('Antrian ' + data.id + ' ' + data.status);
            $('#success').fadeIn('slow').delay(5000).fadeOut();
            return false;
          }
        });

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



<!-- Bootstrap 3.3.6 -->
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script>
$(document).ready(function (){
  $('#success').hide();
  $('#layarAntrian').DataTable({
    'lengthMenu': [10, 20],
    'createdRow': function (row, data, dataIndex){
      var id = data[0];
      //id = id.replace('#', '');
      $(row).attr('id', id);
    },
    'columnDefs': [
      {
        'targets': 3,
        'createdCell': function(td, cellData, rowData, row, col){
          var id = rowData[0];
          //id = id.replace('#', '');
          $(td).attr('id', id);
        }
      }
    ]
    //"columns": ['id', 'jenis']
  });
});
</script>
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
