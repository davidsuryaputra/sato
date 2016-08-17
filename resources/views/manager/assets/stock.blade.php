@extends('layouts.app')

@section('title', 'Manager')

@section('name', Auth::user()->name)

@section('role', 'Manager')

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
      <i class="fa fa-home"></i> <span>Pegawai</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ url('employees') }}"><i class="fa fa-circle-o"></i> Semua Pegawai</a></li>
      <li><a href="{{ url('employees/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
    </ul>

  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Tarif</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('pricings') }}"><i class="fa fa-circle-o"></i> Semua Tarif</a></li>
      <li><a href="{{ url('pricings/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Persediaan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ url('materials') }}"><i class="fa fa-circle-o"></i> Semua Persediaan</a></li>
      <li><a href="{{ url('materials/create') }}"><i class="fa fa-circle-o"></i> Tambah Persediaan</a></li>
    </ul>

  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Aktiva Tetap</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('assets') }}"><i class="fa fa-circle-o"></i> Semua Aktiva Tetap</a></li>
      <li><a href="{{ url('assets/create') }}"><i class="fa fa-circle-o"></i> Tambah Aktiva Tetap</a></li>
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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Buat Transaksi Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('manager.assets.updatestock', $asset->id) }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" name="name" type="text" value="{{ $asset->name }}" disabled>

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('stock') ? 'has-error' : ''  }}">
                <label>Tambah Jumlah</label>
                <input class="form-control" placeholder="Tambah dengan jumlah yang diinginkan." name="quantity" type="text">

                @if($errors->has('stock'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('stock') }}
                </label>
                @endif

              </div>

              <!-- select -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>

            </form>
          </div>
          <!-- /.box-body -->
        </div>
  </section>

  <!-- /.content -->
  @else
  <section class="content">
    Silahkan Hubungi Owner
  </section>
  @endif

</div>

@endsection
