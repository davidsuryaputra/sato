@extends('layouts.app')

@section('title', 'Kasir')

@section('name', Auth::user()->name)

@section('role', 'Kasir')

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
                <h3 class="box-title">Daftar Antrian Kasir {{ $showroomName }}</h3>

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
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>No Kendaraan</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody class="queue">
                @foreach($queues as $queue)
                  <tr id="{{ $queue->id }}">
                    <td>#{{ $queue->id }}</td>
                    <td>{{ $queue->item->name }}</td>
                    <td>{{ $queue->no_kendaraan }}</td>
                    <td class="status{{ $queue->id }}">{{ $queue->status }}</td>
                    <td>
                        <a href="{{ route('cashier.create', $queue->id )}}" onclick="dicuci({{ $queue->id }}, 'Dicuci')" id="Dicuci{{ $queue->id }}" role="button" class="btn btn-primary">Terima</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

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

<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
var pusher = new Pusher("{{ env('PUSHER_KEY') }}");
var channel = pusher.subscribe('antrian');
channel.bind('newAntrian', function (data){
  if(data.showroom_id == {{ Auth::user()->showroom->id}}){
        $('.queue').hide();
    $('.queue').fadeIn('slow');
    $('.queue').prepend(tr);
  }

  // alert(data.message);
});
channel.bind('updateAntrian', function (data){
  if(data.showroom_id == {{ Auth::user()->showroom->id }}){

    if(data.status == "Kasir"){
      var tr = "<tr id="+data.id+"><td>#"+data.id+"</td><td>"+data.jenis+"</td><td>"+data.no_kendaraan+"</td><td id='"+data.id+"'>"+data.status+"</td><td><a href='#urlTransactionIdQueue#' role='button' class='btn btn-primary'>Terima</a></td></tr>";
      $('.queue').hide();
      $('.queue').fadeIn('slow');
      $('.queue').prepend(tr);
    }
  }
});

</script>

@endsection
