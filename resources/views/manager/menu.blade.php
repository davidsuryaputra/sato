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
  {{--
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
  --}}

  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Layanan</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ route('manager.services.index') }}"><i class="fa fa-circle-o"></i> Semua Layanan</a></li>
      <li><a href="{{ route('manager.servicesCategory.index') }}"><i class="fa fa-circle-o"></i> Semua Kategori</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Aktiva Tetap</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('assets') }}"><i class="fa fa-circle-o"></i> Semua Aktiva Tetap</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="{{ route('manager.profile.index') }}">
      <i class="fa fa-home"></i> <span>Profile Showroom</span>
    </a>
  </li>
  @endif

</ul>

@endsection
