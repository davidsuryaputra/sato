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
            <h3 class="box-title">Ubah Pelanggan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              {!! Form::model($client, ['method' => 'patch', 'action' => ['OperatorController@updateClient', $client->id]]) !!}

              <div class="form-group {{ $errors->has('no_kendaraan') ? 'has-error' : ''  }}">
                <label>Nomor Kendaraan</label>
                  {!! Form::text('no_kendaraan', null, ['class' => 'form-control']) !!}

                @if($errors->has('no_kendaraan'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('no_kendaraan') }}
                </label>
                @endif

              </div>

              {{--
              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label>Password</label>
                {!! Form::password('password', ['class' => 'form-control']) !!}

                <label>Password Confirmation</label>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                @if($errors->has('password'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password') }}
                </label>
                @endif

              </div>
              --}}

              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <!-- <input class="form-control" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                <div class="row">
                  <div class="col-md-2">
                    <select class="form-control" name="title">
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                    </select>
                  </div>
                  <div class="col-md-10">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                  </div>
                </div>

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('address') ? 'has-error' : ''  }}">
                <label>Alamat</label>
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="JL. Klampis" name="address" type="text"> -->

                @if($errors->has('address'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('address') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('city') ? 'has-error' : ''  }}">
                <label>Kota</label>
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="Surabaya" name="city" type="text"> -->

                @if($errors->has('city'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('city') }}
                </label>
                @endif
              </div>

              <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}">
                <label>Telepon</label>
                <!-- <input class="form-control" placeholder="03153264" name="phone" type="text"> -->
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                @if($errors->has('phone'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('phone') }}
                </label>
                @endif
              </div>

              {{--
              <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''  }}">
                <label>Saldo</label>
                {!! Form::text('balance', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="5000000" name="balance" type="text"> -->

                @if($errors->has('balance'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('balance') }}
                </label>
                @endif
              </div>
              --}}

              <!-- select -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <!-- <button type="submit" class="btn btn-success">Perbarui</button> -->
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
    Silahkan Hubungi Manager
  </section>
  @endif

</div>

@endsection
