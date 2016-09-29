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
            <h3 class="box-title">Tambah Stok</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('manager.services.updateStock', $service->id) }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" placeholder="Sabun" name="name" type="text" value="{{ $service->name }}" disabled>

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('stock') ? 'has-error' : ''  }}">
                <label>Tambah Stok</label>
                <input class="form-control" placeholder="Jumlah stok yang ingin ditambahkan" name="stock" type="text">

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
