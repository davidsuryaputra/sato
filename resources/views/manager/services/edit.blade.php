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
            <h3 class="box-title">Ubah Layanan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              {!! Form::model($service, ['method' => 'post', 'action' => ['ManagerController@servicesUpdate', $service->id]]) !!}

              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('value') ? 'has-error' : ''  }}">
                <label>Harga</label>
                {!! Form::text('value', null, ['class' => 'form-control']) !!}

                @if($errors->has('value'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('value') }}
                </label>
                @endif

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Perbarui</button>
              </div>

            <!-- </form> -->
            {!! Form::close() !!}

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