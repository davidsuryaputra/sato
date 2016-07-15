@extends('layouts.app')

@section('title', 'Operator')

@section('name', Auth::user()->name)

@section('role', 'Operator')

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
      <i class="fa fa-home"></i> <span>Material</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ url('operator/materials') }}"><i class="fa fa-circle-o"></i> Semua Material</a></li>
      <li><a href="{{ url('operator/materials/create') }}"><i class="fa fa-circle-o"></i> Transaksi</a></li>
    </ul>

  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Asset</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('operator/assets') }}"><i class="fa fa-circle-o"></i> Semua Asset</a></li>
      <li><a href="{{ url('operator/assets/create') }}"><i class="fa fa-circle-o"></i> Transaksi</a></li>
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
                <h3 class="box-title">Semua Asset</h3>

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
                    <th>Harga</th>
                    <th>Stok</th>
                    <!-- <th>Transaksi</th> -->
                    <th>Pilihan</th>
                  </tr>
                  @foreach($assets as $asset)
                  <tr>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->value }}</td>
                    <td>{{ $asset->stocks }}</td>
                    {{--
                    <td>
                        @if($asset->transaction_category == 1)
                          Income
                        @elseif($asset->transaction_category == 2)
                          Outcome
                        @endif
                    </td>
                    --}}
                    <td>
                      <a href="{{ route('operator.assets.destroy', $asset->id) }}" role="button" class="btn btn-danger">Delete</a>
                      {{--
                      <a href="{{ route('operator.materials.edit', $material->id) }}" role="button" class="btn btn-warning">Edit</a>
                      --}}
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
    Silahkan Hubungi Manager
  </section>
  @endif

</div>

@endsection
