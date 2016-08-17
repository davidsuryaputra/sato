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
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Gaji</th>
                    <th>Jabatan</th>
                    <th>Pilihan</th>
                  </tr>
                  @foreach($employees as $employee)
                  <tr>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->balance }}</td>
                    <td>
                      @if($employee->role->name == 'accountant')
                        Akunting
                      @elseif($employee->role->name == 'operator')
                        Operator Toko
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('manager.employees.destroy', $employee->id) }}" role="button" class="btn btn-danger">Delete</a>
                      <a href="{{ route('manager.employees.edit', $employee->id) }}" role="button" class="btn btn-warning">Edit</a>
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
  @else
  <section class="content">
    Silahkan Hubungi Owner
  </section>
  @endif

</div>

@endsection
