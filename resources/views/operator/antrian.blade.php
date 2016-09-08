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
    <a href="{{ url('terimaPelanggan') }}">
      <i class="fa fa-home"></i> <span>Terima Pelanggan</span></i>
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
    <a href="{{ url('antrian') }}">
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

  <li class="treeview">
    <a href="{{ url('layarAntrian') }}" target="_blank">
      <i class="fa fa-home"></i> <span>Layar Antrian</span>
    </a>
  </li>
  @endif

</ul>

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
                <h3 class="box-title">Daftar Antrian {{ $showroomName }}</h3>

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
                    <th>No</th>
                    <th>Jenis</th>
                    <th>No Kendaraan</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                @foreach($queues as $queue)
                  <tr id="{{ $queue->id }}">
                    <td>#{{ $queue->id }}</td>
                    <td>{{ $queue->item->name }}</td>
                    <td>{{ $queue->no_kendaraan }}</td>
                    <td class="status{{ $queue->id }}">{{ $queue->status }}</td>
                    <td>
                      @if($queue->status == 'Menunggu')
                        <a href="#" onclick="dicuci({{ $queue->id }}, 'Dicuci')" id="Dicuci{{ $queue->id }}" role="button" class="btn btn-primary">Dicuci</a>
                        <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="btn btn-primary disabled">Pengeringan</a>
                        <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="btn btn-primary disabled">Selesai</a>
                        <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="btn btn-success disabled"><i class="fa fa-money"></i> Kasir</a>
                      @elseif($queue->status == 'Dicuci')
                      <a href="#" onclick="pengeringan({{ $queue->id }}, 'Pengeringan')" id="Pengeringan{{ $queue->id }}" role="button" class="btn btn-primary">Pengeringan</a>
                      <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="btn btn-primary disabled">Selesai</a>
                      <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="btn btn-success disabled"><i class="fa fa-money"></i> Kasir</a>
                      @elseif($queue->status == 'Pengeringan')
                        <a href="#" onclick="selesai({{ $queue->id }}, 'Selesai')" id="Selesai{{ $queue->id }}" role="button" class="btn btn-primary">Selesai</a>
                        <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="btn btn-success disabled"><i class="fa fa-money"></i> Kasir</a>
                      @elseif($queue->status == 'Selesai')
                        <a href="#" onclick="kasir({{ $queue->id }}, 'Kasir')" id="Kasir{{ $queue->id }}" role="button" class="btn btn-success"><i class="fa fa-money"></i> Kasir</a>
                      @endif
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

<script>
function dicuci(id, status)
{
  var cuciData = {
    'id' : id,
    'showroom_id' : {{ Auth::user()->showroom->id }},
    'status' : status,
  };
  $.get("updateStatus", cuciData, function (data){
    var id = data.status+""+data.id;
    // alert(id);
    $("a[id="+id+"]").remove();
    $("a[id=Pengeringan"+data.id+"]").removeClass('disabled');
    $("td[class=status"+data.id+"]").html(data.status);
  });
}

function pengeringan(id, status)
{
  var pengeringanData = {
    'id' : id,
    'showroom_id' : {{ Auth::user()->showroom->id }},
    'status' : status,
  };
  $.get("updateStatus", pengeringanData, function (data){
    var id = data.status+""+data.id;
    $("a[id="+id+"]").remove();
    $("a[id=Selesai"+data.id+"]").removeClass('disabled');
    $("td[class=status"+data.id+"]").html(data.status);
  });
}

function selesai(id, status)
{
  var selesaiData = {
    'id' : id,
    'showroom_id' : {{ Auth::user()->showroom->id }},
    'status' : status,
  };
  $.get("updateStatus", selesaiData, function (data){
    //loading animation
    var id = data.status+""+data.id;
    $("a[id="+id+"]").remove();
    $("a[id=Kasir"+data.id+"]").removeClass('disabled');
    $("td[class=status"+data.id+"]").html(data.status);
  });
}

function kasir(id, status)
{
  var kasirData = {
    'id' : id,
    'showroom_id' : {{ Auth::user()->showroom->id }},
    'status' : status,
  };

  $.get("updateStatus", kasirData, function (data){
    var id = data.status+data.id;
    $("a[id="+id+"]").remove();
    $("td[class=status"+data.id+"]").html(data.status);
    setTimeout(function (){
      $("tr[id="+data.id+"]").remove();
    }, 5000);
  });
}
</script>

@endsection
