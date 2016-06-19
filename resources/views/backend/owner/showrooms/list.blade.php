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
    <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Outlet</h3>

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
                  <tbody><tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Tanggal Buka</th>
                    <th>Saldo</th>
                    <th>Pilihan</th>
                  </tr>

                  @foreach($showrooms as $showroom)
                  <tr>
                    <td>{{ $showroom->name }}</td>
                    <td>{{ $showroom->address }}</td>
                    <td>{{ $showroom->city }}</td>
                    <td>{{ $showroom->phone }}</td>
                    <td>{{ $showroom->created_at }}</td>
                    <td>{{ $showroom->balance }}</td>
                    <td>
                      <a href="{{ route('owner.showrooms.delete', $showroom->id) }}" role="button" class="btn btn-danger">Delete</a>
                      <a href="{{ route('owner.showrooms.edit', $showroom->id) }}" role="button" class="btn btn-warning">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody></table>

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
