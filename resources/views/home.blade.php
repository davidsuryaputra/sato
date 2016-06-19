@extends('layouts.app')

@section('title', 'Owner')

@section('header')
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SATO</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Owner</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">Mr. Sato Owner</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

              <p>
                Mr. Sato Owner - Founder & CEO
                <small>CEO since Nov. 2012</small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              {{--
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              --}}

              <div class="pull-right">
                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
@endsection

@section('sidebar')
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Mr. Sato Owner</p>
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
    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <li class="active treeview">
        <a href="{{ url('home') }}">
          <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-home"></i> <span>Outlet</span> <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{ url('owner/showrooms') }}"><i class="fa fa-circle-o"></i> Semua Outlet</a></li>
          <li><a href="{{ url('owner/showrooms/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
        </ul>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Manajer</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('owner/managers') }}"><i class="fa fa-circle-o"></i> Semua Manajer</a></li>
          <li><a href="{{ url('owner/managers/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
        </ul>
      </li>

      {{--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Laporan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('owner/reports') }}"><i class="fa fa-circle-o"></i> Semua Laporan</a></li>
          <li><a href="{{ url('owner/reports/showroom') }}"><i class="fa fa-circle-o"></i> Pilih Outlet</a></li>
        </ul>
      </li>
      --}}

      {{--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Pesan</span>
          <small class="label pull-right bg-yellow">12</small>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('owner/messages') }}"><i class="fa fa-circle-o"></i> Semua Pesan</a></li>
          <li><a href="{{ url('owner/messages/create') }}"><i class="fa fa-circle-o"></i> Tulis Pesan</a></li>
        </ul>
      </li>
      --}}

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
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
</div>

@endsection

@section('footer')
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.3
  </div>
  <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>
@endsection
