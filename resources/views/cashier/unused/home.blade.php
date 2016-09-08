@extends('layouts.app')

@section('title', 'Accountant')

@section('name', Auth::user()->name)

@section('role', 'Accountant')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="{{ url('home') }}">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  @if($showroomName != "Belum Ada Izin")
  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li>
      <a href="{{ url('transactions') }}">
        <i class="fa fa-home"></i> <span>Semua Transaksi</span>
      </a>
      </li>

      <li>
      <a href="{{ url('transactions/create') }}">
        <i class="fa fa-circle-o"></i> <span>Buat Transaksi</span>
      </a>
      </li>
    </ul>

  </li>

  @endif

</ul>

@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $showroomName }}
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

  @if($showroomName != "Belum Ada Izin")
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>

            <p>Transaksi masuk hari ini.</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53</h3>

            <p>Transaksi keluar hari ini.</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>

            <p>Pelanggan hari ini.</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Pengunjung hari ini.</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
            <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> Pemasukan</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
          </div>
        </div>
        <!-- /.nav-tabs-custom -->

        {{--
        <!-- quick email widget -->
        <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>

            <h3 class="box-title">Kirim Pesan</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="#" method="post">
              <div class="form-group">
                <input type="email" class="form-control" name="emailto" placeholder="Email to:">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              <div>
                <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </form>
          </div>
          <div class="box-footer clearfix">
            <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
              <i class="fa fa-arrow-circle-right"></i></button>
          </div>
        </div>
        --}}

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">

        <!-- solid sales graph -->
        <div class="box box-solid bg-teal-gradient">
          <div class="box-header">
            <i class="fa fa-th"></i>

            <h3 class="box-title">Pengeluaran</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body border-radius-none">
            <div class="chart" id="line-chart" style="height: 250px;"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-border">
            <div class="row">
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                <div class="knob-label">Mail-Orders</div>
              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                <div class="knob-label">Online</div>
              </div>
              <!-- ./col -->
              <div class="col-xs-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">

                <div class="knob-label">In-Store</div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
  @else
  <section class="content">
    Silahkan Hubungi Manager
  </section>
  @endif

</div>

@endsection
