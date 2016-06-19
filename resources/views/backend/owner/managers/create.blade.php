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
        <!-- Messages: style can be found in dropdown.less-->

        <!-- Notifications: style can be found in dropdown.less -->

        <!-- Tasks: style can be found in dropdown.less -->

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
<!-- Content Wrapper. Contains page content -->
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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Manajer Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('owner.managers.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <label>Email</label>
                <input class="form-control" placeholder="kika@mail.com" name="email" type="text">

                @if($errors->has('email'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('email') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label>Password</label>
                <input class="form-control" name="password" type="password">

                @if($errors->has('password'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''  }}">
                <label>Password Confirmation</label>
                <input class="form-control" name="password_confirmation" type="password">

                @if($errors->has('password_confirmation'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password_confirmation') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" placeholder="Mr. Kika" name="name" type="text">

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('address') ? 'has-error' : ''  }}">
                <label>Alamat</label>
                <input class="form-control" placeholder="JL. Ngagel" name="address" type="text">

                @if($errors->has('address'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('address') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('city') ? 'has-error' : ''  }}">
                <label>Kota</label>
                <input class="form-control" placeholder="Surabaya" name="city" type="text">

                @if($errors->has('city'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('city') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}">
                <label>Telepon</label>
                <input class="form-control" placeholder="03153264" name="phone" type="text">

                @if($errors->has('phone'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('phone') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''  }}">
                <label>Gaji</label>
                <input class="form-control" placeholder="5000000" name="balance" type="text">

                @if($errors->has('balance'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('balance') }}
                </label>
                @endif

              </div>

              {{--
              <!-- select -->
              <div class="form-group">
                <label>Pilih Outlet</label>
                <select class="form-control">
                  <option>Sato Klampis</option>
                  <option>Sato Veteran 2</option>
                  <option>Sato Ngagel 1</option>
                  <option>Sato Pucang 3</option>
                  <option>Sato Diponegoro</option>
                </select>
              </div>
              --}}

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>

            </form>
          </div>
          <!-- /.box-body -->
        </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
