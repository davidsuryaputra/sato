@extends('layouts.app')

@section('title', 'Cashier')

@section('name', Auth::user()->name)

@section('role', 'Cashier')

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
    <a href="{{ url('transactions') }}">
      <i class="fa fa-home"></i> <span>Semua Transaksi</span>
    </a>

    {{--
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
    --}}

  </li>

  <li class="treeview">
    <a href="{{ route('cashier.antrian') }}">
      <i class="fa fa-home"></i> <span>Antrian</span>
    </a>

    {{--
    <ul class="treeview-menu">
      <li>
        <a href="{{ url('clients') }}">
          <i class="fa fa-circle-o"></i> <span>Semua Pelanggan</span>
        </a>
      </li>

      <li>
          <a href="{{ url('clients/create') }}">
            <i class="fa fa-circle-o"></i> <span>Tambah Pelanggan</span>
          </a>
      </li>
    </ul>
    --}}
  </li>
  @endif

</ul>

@endsection
