@extends('manager.menu')

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
            <h3 class="box-title">Tambah Aktiva Tetap</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('manager.assets.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" placeholder="Kursi" name="name" type="text">

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('value') ? 'has-error' : ''  }}">
                <label>Harga Pembelian</label>
                <input class="form-control" name="value" type="text">

                @if($errors->has('value'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('value') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('stocks') ? 'has-error' : ''  }}">
                <label>Jumlah</label>
                <input class="form-control" placeholder="5" name="quantity" type="text">

                @if($errors->has('stocks'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('stocks') }}
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
    Silahkan Hubungi Manager
  </section>
  @endif

</div>

@endsection
